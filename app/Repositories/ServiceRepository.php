<?php

namespace App\Repositories;

use App\Service;
use App\User;
use Auth;

class ServiceRepository
{

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    private function save(Service $service, Array $inputs)
    {
        $service->name = $inputs['name'];
        $service->price = $inputs['price'];
        $service->duration = $inputs['duration'];
        $service->description = $inputs['description'];
        $service->salon_id = $inputs['salon_id'];
        $service->save();
    }

    public function getPaginate($n)
    {
        return $this->service->paginate($n);
    }

    public function getServicesForOwnerSalons()
    {
        $salons = User::find(Auth::user()->id)->salons;
        $services = [];
        foreach ($salons as $salon) {
            $servicesSalon = $salon->services->all();
            if ($servicesSalon != null) {
                $services = array_merge($services, $servicesSalon);
            }
        }
        return $services;
    }

    public function store(Array $inputs)
    {
        $service = new $this->service;
        $this->save($service, $inputs);

        return $service;
    }

    public function getById($id)
    {
        return $this->service->with('salon')->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $service=$this->getById($id);
        $service->artisans()->detach();
        $service->delete();
    }
}