<?php
namespace App\Repositories;
use App\ArtisanService;
use App\Artisan;
use App\Service;

class SearchRepository
{
    public $artisans_services;
    public $service;
    public $sex;
    public $specialty;
    public $salon;
    public $first_name;
    public $last_name;
    public $date;
    public $beginning;
    public $end;

    public function __construct()
    {
        $this->artisans_services=ArtisanService::all();
    }
    private function check(ArtisanService $artisan_service)
    {
        $artisan=Artisan::find($artisan_service->artisan_id);
        $service=Service::find($artisan_service->service_id);
//        if($this->sex!=NULL AND $this->sex!='A' AND $artisan->sex!=$this->sex)
//        {
//            return false;
//        }
//        if($this->specialty!=NULL AND $artisan->specialty!=$this->specialty)
//        {
//            return false;
//        }
//        if($this->salon!=NULL AND $artisan->salon()!=$this->salon)
//        {
//            return false;
//        }
//        if($this->first_name!=NULL AND $artisan->first_name!=$this->first_name)
//        {
//            return false;
//        }
//        if($this->last_name!=NULL AND $artisan->last_name!=$this->last_name)
//        {
//            return false;
//        }
//        if($this->service!=NULL AND $service->name!=$this->service)
//        {
//            return false;
//        }
        /*if(date!=NULL)
        {

            $results = ::select('select * from users where id = ?', array(1));
        }*/

        return true;
    }
    public function index()
    {
        $results=array();
        foreach($this->artisans_services as $artisan_service)
        {
            if($this->check($artisan_service))
            {
                $res['artisan']=Artisan::find($artisan_service->artisan_id);
                $res['service']=Service::find($artisan_service->service_id);
                $res['artisan_service']=$artisan_service;
                array_push($results,$res);
            }
        }
        return $results;
    }
}