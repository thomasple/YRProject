<?php

namespace App\Repositories;

use App\Artisan;

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

    public function store(Array $inputs)
    {
        $artisan = new $this->artisan;
        $this->save($artisan, $inputs);

        return $artisan;
    }

    public function getById($id)
    {
        return $this->artisan->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $photo=$this->getById($id)->main_photo;
        if($photo!=config('images.anonym')){
            \File::delete($photo);
        }
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $photo=$this->getById($id)->main_photo;
        if($photo!=config('images.anonym')){
            \File::delete($photo);
        }
        $this->getById($id)->delete();
    }

    public function compute_photo($photo)
    {
        if ($photo->isValid()) {
            $path = config('images.path');
            $extension = $photo->getClientOriginalExtension();

            do {
                $name = str_random(10) . '.' . $extension;
            }while(file_exists($path.'/'.$name));
            $photo->move($path, $name);
            return $path.'/'.$name;
        }
        return false;
    }

}