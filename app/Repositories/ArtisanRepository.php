<?php

namespace App\Repositories;

use App\Artisan;
use App\User;
use App\Salon;
use Auth;

class ArtisanRepository
{

    protected $artisan;

    public function __construct(Artisan $artisan)
    {
        $this->artisan = $artisan;
    }

    private function save(Artisan $artisan, Array $inputs)
    {
        $artisan->first_name = $inputs['first_name'];
        $artisan->last_name = $inputs['last_name'];
        $artisan->email = $inputs['email'];
        $artisan->sex = $inputs['sex'];
        $artisan->specialty = $inputs['specialty'];
        $artisan->description = $inputs['description'];
        $artisan->main_photo = $inputs['main_photo'];
        $artisan->salon_id = $inputs['salon_id'];
        $artisan->save();
    }


    public function getPaginate($n)
    {
        return $this->artisan->paginate($n);
    }

    public function getArtisansForOwnerSalons()
    {
        $salons = User::find(Auth::user()->id)->salons;
        $artisans = [];
        foreach ($salons as $salon) {
            $artisansSalon = $salon->artisans->all();
            if ($artisansSalon != null) {
                $artisans = array_merge($artisans, $artisansSalon);
            }
        }
        return $artisans;
    }

    public function store(Array $inputs)
    {
        $artisan = new $this->artisan;
        $this->save($artisan, $inputs);

        return $artisan;
    }

    public function getById($id)
    {
        return $this->artisan->with('salon')->findOrFail($id);
    }

    public function update($salon, Array $inputs)
    {
        $this->save($salon, $inputs);
    }

    public function destroy(PhotoRepository $photoRepository, $id)
    {
        $photoRepository->delete_photo($this->getById($id)->main_photo);
        $this->getById($id)->delete();
    }
}