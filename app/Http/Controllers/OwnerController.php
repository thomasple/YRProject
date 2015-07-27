<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salon;
use App\Artisan;
use App\Service;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
        $this->middleware('confirmed');
        $this->middleware('chose_salon');
        $this->middleware('ajax', ['only'=>['attachArtisanService', 'detachArtisanService']]);
    }

    public function getSalonConfiguration()
    {
        return view('salon_configuration/index');
    }

    public function getAttachFromArtisan($artisan_id)
    {
        $services = Salon::Find(session('salon_chosen'))->services;
        $artisan=Artisan::find($artisan_id);
        if (in_array($artisan_id, Salon::Find(session('salon_chosen'))->artisans()->lists('id')->all())) {
            $servicesAttachedToArtisan = $artisan->services()->lists('service_id')->all();
            return view('salon_configuration/attach-from-artisan')->with(['artisan' => $artisan, 'services' => $services,
                'servicesAttachedToArtisan' => $servicesAttachedToArtisan]);
        }
        return redirect('/');
    }

    public function getAttachFromService($service_id)
    {
        $artisans = Salon::Find(session('salon_chosen'))->artisans;
        $service=Service::find($service_id);
        if (in_array($service_id, Salon::Find(session('salon_chosen'))->services()->lists('id')->all())) {
            $artisansAttachedToService = $service->artisans()->lists('artisan_id')->all();
            return view('salon_configuration/attach-from-service')->with(['service' => $service, 'artisans' => $artisans,
                'artisansAttachedToService' => $artisansAttachedToService]);
        }
        return redirect('/');
    }

    public function attachArtisanService(Request $request, $artisan_id, $service_id)
    {
        if ($this->checkArtisanAndService($artisan_id, $service_id)) {
            Artisan::find($artisan_id)->services()->attach($service_id);
            return response()->json(['response' => 'ok']);
        }
        return redirect('/');
    }

    public function detachArtisanService(Request $request, $artisan_id, $service_id)
    {
        if ($this->checkArtisanAndService($artisan_id, $service_id)) {
            Artisan::find($artisan_id)->services()->detach($service_id);
            return response()->json(['response' => 'ok']);
        }
        return redirect('/');
    }

    protected function checkArtisanAndService($artisan_id, $service_id)
    {
        if (in_array($service_id, Salon::Find(session('salon_chosen'))->services()->lists('id')->all())
            AND in_array($artisan_id, Salon::Find(session('salon_chosen'))->artisans()->lists('id')->all())
        ) {
            return true;
        }
        return false;
    }

}
