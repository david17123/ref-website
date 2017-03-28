<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\University;
use App\Asset;

class UniversityController extends Controller
{
    public function index(University $university)
    {
        $viewVars = [
            'university' => $university
        ];
        return view('page/admin/manageUniSite', $viewVars);
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
