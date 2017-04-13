<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HelperClasses\SitePageService;

use App\University;
use App\SermonSummary;
use App\Asset;
use App\Author;

class UniversityController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function index(University $university)
    {
        $this->sitePage->setPageClass('admin-manage-uni-site');

        $viewVars = [
            'university' => $university
        ];
        return view('page/admin/manageUniSite', $viewVars);
    }

    public function manageSermonSummaries(University $university)
    {
        $this->sitePage->setPageClass('admin-manage-sermon-summaries');

        $sermonSummaries = SermonSummary::where('sermon_location_id', '=', $university->id)
                                        ->get();

        $viewVars = [
            'university' => $university,
            'sermonSummaries' => $sermonSummaries
        ];
        return view('page/admin/manageSermonSummaries', $viewVars);
    }

    public function createSermonSummary(University $university)
    {
        $this->sitePage->setPageClass('admin-edit-sermon-summary');

        $this->sitePage->setJavascriptVar('preachersAjaxUrl', route('getAuthorsAjax'));

        $viewVars = [
            'university' => $university
        ];
        return view('page/admin/editSermonSummary', $viewVars);
    }

    public function editSermonSummary(University $university, SermonSummary $sermonSummary)
    {
        $this->sitePage->setPageClass('admin-edit-sermon-summary');

        $this->sitePage->setJavascriptVar('preachersAjaxUrl', route('getAuthorsAjax'));

        $viewVars = [
            'university' => $university,
            'sermonSummary' => $sermonSummary
        ];
        return view('page/admin/editSermonSummary', $viewVars);
    }

    public function saveSermonSummary(Request $request, University $university)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'content' => 'required|string',
            'preacher' => 'required|numeric',
            'summarizer' => 'required|numeric',
            'datePreached' => 'required|date_format:Y-m-d',
            'heroImage' => 'required|array',
            'sermonSummaryId' => 'numeric'
        ]);

        // Fetch sermon summary object
        $sermonSummaryId = $request->input('sermonSummaryId', '');
        if ($sermonSummaryId === '')
        {
            $sermonSummary = new SermonSummary();
            $sermonSummary->sermonLocation()->associate($university);
        }
        else
        {
            $sermonSummary = SermonSummary::find($sermonSummaryId);
            if ( !$sermonSummary )
            {
                abort(404, 'Sermon summary not found');
            }
        }

        // Fetch preacher and summarizer objects
        $preacherId = $request->input('preacher');
        $preacher = Author::find($preacherId);
        if ( !$preacher )
        {
            abort(404, 'Preacher not found');
        }

        $summarizerId = $request->input('summarizer');
        $summarizer = Author::find($summarizerId);
        if ( !$summarizer )
        {
            abort(404, 'Summarizer not found');
        }

        // Process hero image
        $heroImageId = count($request->input('heroImage')) > 0 ? $request->input('heroImage') : null;
        $heroImage = Asset::find($heroImageId)->first();
        if ($heroImage)
        {
            $heroImage->finalize();
        }

        $sermonSummary->title = $request->input('title');
        $sermonSummary->subtitle = $request->input('subtitle');
        $sermonSummary->content = $request->input('content');
        $sermonSummary->date_preached = Carbon::createFromFormat('Y-m-d', $request->input('datePreached'));
        $sermonSummary->preacher()->associate($preacher);
        $sermonSummary->summarizer()->associate($summarizer);
        if ($heroImage)
        {
            if ($sermonSummary->heroImage && $sermonSummary->heroImage->id != $heroImage->id)
            {
                // Remove the old hero image
                $sermonSummary->heroImage->remove();
            }
            $sermonSummary->heroImage()->associate($heroImage);
        }

        $sermonSummary->save();

        return redirect()->route('editSermonSummary', ['uniUrl' => $university->subdomain, 'sermonSummary' => $sermonSummary->id]);
    }

    public function deleteSermonSummary(University $university, SermonSummary $sermonSummary)
    {
        if ($sermonSummary->heroImage)
        {
            $heroImage = $sermonSummary->heroImage;
            $sermonSummary->heroImage()->dissociate();
            $heroImage->remove();
        }
        $sermonSummary->delete();
        return redirect()->route('manageSermonSummaries', ['uniUrl' => $university->subdomain]);
    }

    public function saveSiteDetails(Request $request, University $university)
    {
        // Validate request
        $this->validate($request, [
            'name' => 'required',
            'subdomain' => 'required',
            'meetingPlace' => 'required|max:255',
            'meetingTime' => 'required|max:255',
            'contactPerson' => 'required|max:255',
            'uniLogo' => 'required|array'
        ]);

        // Process uni logo
        $uniLogoId = count($request->input('uniLogo')) > 0 ? $request->input('uniLogo') : null;
        $uniLogo = Asset::find($uniLogoId)->first();
        if ($uniLogo)
        {
            $uniLogo->finalize();
        }

        // Save request
        $university->name = $request->input('name');
        $university->subdomain = $request->input('subdomain');
        $university->published = $request->input('published') === '1';
        $university->meeting_place = $request->input('meetingPlace');
        $university->meeting_time = $request->input('meetingTime');
        $university->contact_person = $request->input('contactPerson');
        if ($uniLogo)
        {
            if ($university->logo && $university->logo->id != $uniLogo->id)
            {
                // Remove the old logo
                $university->logo->remove();
            }
            $university->logo()->associate($uniLogo);
        }
        $university->save();

        return redirect()->route('manageUniSite', ['uniUrl' => $university->subdomain]);
    }

    public function createUni()
    {
        // Get new uni subdomain
        $existingUnis = University::all();
        $existingUniSubdomains = [];
        foreach ($existingUnis as $uni)
        {
            $existingUniSubdomains[$uni->subdomain] = true;
        }
        $index = 1;
        while (true)
        {
            if ( !isset($existingUniSubdomains['uni'.$index]) )
            {
                break;
            }
            $index++;
        }
        $newUniSubdomain = 'uni'.$index;

        $university = new University();
        $university->name = 'New University '.$index;
        $university->subdomain = $newUniSubdomain;
        $university->save();

        return redirect()->route('manageUniSite', ['uniUrl' => $university->subdomain]);
    }
}
