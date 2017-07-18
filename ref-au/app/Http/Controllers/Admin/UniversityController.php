<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HelperClasses\SitePageService;

use App\University;
use App\SermonSummary;
use App\Event;
use App\Asset;
use App\AssetGroup;
use App\Author;

class UniversityController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    /**
     * Sets the asset group's assets to be the one listed in the $newAssets
     * specified.
     *
     * @param AssetGroup $assetGroup
     * @param Collection $newAssets
     * @param bool $remove $asset->remove() will only be called if this is true.
     * Defaults to false.
     * @return Array(Asset) List of assets to be removed from the group
     */
    private function _updateAssetGroup(AssetGroup $assetGroup, Collection $newAssets, $remove=false)
    {
        $oldAssets = $assetGroup->assets;
        $oldAssetsHash = [];
        foreach ($oldAssets as $oldAsset)
        {
            $oldAssetsHash[$oldAsset->id] = $oldAsset;
        }

        if (count($newAssets) > 0)
        {
            // Save new assets
            foreach ($newAssets as $newAsset)
            {
                if ( isset($oldAssetsHash[$newAsset->id]) )
                {
                    // Asset is associated properly. Do not delete.
                    unset($oldAssetsHash[$newAsset->id]);
                }
                else
                {
                    $newAsset->asset_group_id = $assetGroup->id;
                    $newAsset->save();
                }
            }
        }

        $assetsToRemove = [];
        foreach ($oldAssetsHash as $assetId => $oldAsset)
        {
            $assetsToRemove[] = $oldAsset;
            if ($remove)
            {
                $oldAsset->remove();
                $oldAsset->save();
            }
        }

        return $assetsToRemove;
    }

    public function index(University $university)
    {
        $this->sitePage->setPageClass('admin-manage-uni-site');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => $university->name]
        ]);

        $viewVars = [
            'university' => $university
        ];
        return view('page/admin/manageUniSite', $viewVars);
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

    public function saveSiteDetails(Request $request, University $university)
    {
        // Validate request
        $this->validate($request, [
            'name' => 'required',
            'subdomain' => 'required',
            'meetingPlace' => 'required|max:255',
            'meetingTime' => 'required|max:255',
            'contactPerson' => 'required|max:255',
            'uniLogo' => 'required|array',
            'banners' => 'required|array',
            'clubPictures' => 'required|array'
        ]);

        // Process uni logo
        $newUniLogoId = count($request->input('uniLogo')) > 0 ? $request->input('uniLogo') : null;
        $newUniLogo = Asset::find($newUniLogoId)->first();
        if ($newUniLogo)
        {
            $newUniLogo->finalize();
        }

        // Process banner images
        $newBannerIds = count($request->input('banners')) > 0 ? $request->input('banners') : [];
        $newBanners = Asset::whereIn('id', $newBannerIds)->get();
        if (count($newBanners) > 0)
        {
            foreach ($newBanners as $asset)
            {
                $asset->finalize();
            }
        }

        // Process club pictures
        $newClubPictureIds = count($request->input('clubPictures')) > 0 ? $request->input('clubPictures') : [];
        $newClubPictures = Asset::whereIn('id', $newClubPictureIds)->get();
        if (count($newClubPictures) > 0)
        {
            foreach ($newClubPictures as $asset)
            {
                $asset->finalize();
            }
        }

        // Save request
        $university->name = $request->input('name');
        $university->subdomain = $request->input('subdomain');
        $university->published = $request->input('published') === '1';
        $university->meeting_place = $request->input('meetingPlace');
        $university->meeting_time = $request->input('meetingTime');
        $university->contact_person = $request->input('contactPerson');

        $assetsToRemove = [];

        if ($newUniLogo)
        {
            if ($university->logo && $university->logo->id != $newUniLogo->id)
            {
                // Remove the old logo
                $assetsToRemove[] = $university->logo;
            }
            $university->logo()->associate($newUniLogo);
        }

        // Update banner images
        if ( !$university->bannersAssetGroup )
        {
            $bannersAssetGroup = new AssetGroup();
            $bannersAssetGroup->save();
            $university->bannersAssetGroup()->associate($bannersAssetGroup);
        }
        $assetsToRemove = array_merge($assetsToRemove, $this->_updateAssetGroup($university->bannersAssetGroup, $newBanners, false));

        // Update club pictures
        if ( !$university->clubPicturesAssetGroup )
        {
            $clubPicturesAssetGroup = new AssetGroup();
            $clubPicturesAssetGroup->save();
            $university->clubPicturesAssetGroup()->associate($clubPicturesAssetGroup);
        }
        $assetsToRemove = array_merge($assetsToRemove, $this->_updateAssetGroup($university->clubPicturesAssetGroup, $newClubPictures, false));

        // Delete old assets
        foreach ($assetsToRemove as $oldAsset)
        {
            $oldAsset->remove();
        }

        $university->save();

        return redirect()->route('manageUniSite', ['uniUrl' => $university->subdomain]);
    }

    public function deleteUniSite(University $university)
    {
        if ($university->logo)
        {
            $logo = $university->logo;
            $university->logo()->dissociate();
            $logo->remove();
        }

        if ($university->bannersAssetGroup)
        {
            $bannersAssetGroup = $university->bannersAssetGroup;
            $university->bannersAssetGroup()->dissociate();
            $bannersAssetGroup->cleanDelete();
        }

        if ($university->clubPicturesAssetGroup)
        {
            $clubPicturesAssetGroup = $university->clubPicturesAssetGroup;
            $university->clubPicturesAssetGroup()->dissociate();
            $clubPicturesAssetGroup->cleanDelete();
        }

        $university->delete();
        return redirect()->route('adminHome');
    }


    public function manageSermonSummaries(University $university)
    {
        $this->sitePage->setPageClass('admin-manage-sermon-summaries');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => $university->name]
        ]);

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
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => $university->name, 'link' => route('manageSermonSummaries', ['uniUrl'=>$university->subdomain])],
            ['text' => 'New sermon summary']
        ]);

        $viewVars = [
            'university' => $university,
            'preachersAjaxUrl' => route('getAuthorsAjax')
        ];
        return view('page/admin/editSermonSummary', $viewVars);
    }

    public function editSermonSummary(University $university, SermonSummary $sermonSummary)
    {
        $this->sitePage->setPageClass('admin-edit-sermon-summary');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => $university->name, 'link' => route('manageSermonSummaries', ['uniUrl'=>$university->subdomain])],
            ['text' => $sermonSummary->title]
        ]);

        $viewVars = [
            'university' => $university,
            'sermonSummary' => $sermonSummary,
            'preachersAjaxUrl' => route('getAuthorsAjax')
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
        $sermonSummary->published = $request->input('published') === '1';
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


    public function manageEvents(University $university)
    {
        $this->sitePage->setPageClass('admin-manage-events');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => $university->name]
        ]);

        $events = Event::where('location_id', '=', $university->id)
                       ->get();

        $viewVars = [
            'university' => $university,
            'events' => $events
        ];
        return view('page/admin/manageEvents', $viewVars);
    }

    public function createEvent(University $university)
    {
        $this->sitePage->setPageClass('admin-edit-event');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => $university->name, 'link' => route('manageEvents', ['uniUrl'=>$university->subdomain])],
            ['text' => 'New event']
        ]);

        $viewVars = [
            'university' => $university
        ];
        return view('page/admin/editEvent', $viewVars);
    }

    public function editEvent(University $university, Event $event)
    {
        $this->sitePage->setPageClass('admin-edit-event');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => $university->name, 'link' => route('manageEvents', ['uniUrl'=>$university->subdomain])],
            ['text' => $event->title]
        ]);

        $viewVars = [
            'university' => $university,
            'event' => $event
        ];
        return view('page/admin/editEvent', $viewVars);
    }

    public function saveEvent(Request $request, University $university)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'dateCommenced' => 'required|date_format:Y-m-d',
            'dateFinished' => 'required|date_format:Y-m-d'
        ]);

        // Fetch sermon summary object
        $eventId = $request->input('eventId', '');
        if ($eventId === '')
        {
            $event = new Event();
            $event->location()->associate($university);
        }
        else
        {
            $event = SermonSummary::find($eventId);
            if ( !$event )
            {
                abort(404, 'Event not found');
            }
        }

        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->date_commenced = Carbon::createFromFormat('Y-m-d', $request->input('dateCommenced'));
        $event->date_finished = Carbon::createFromFormat('Y-m-d', $request->input('dateFinished'));

        $event->save();

        return redirect()->route('editEvent', ['uniUrl' => $university->subdomain, 'event' => $event->id]);
    }

    public function deleteEvent(University $university, Event $event)
    {
        $event->delete();
        return redirect()->route('manageEvents', ['uniUrl' => $university->subdomain]);
    }
}
