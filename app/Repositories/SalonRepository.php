<?php
namespace App\Repositories;
use App\Salon;
use App\User;

class SalonRepository
{
    protected $salon;

    public function __construct(Salon $salon)
    {
        $this->salon = $salon;
    }

    private function save(Salon $salon, Array $inputs)
    {
        $salon->name = $inputs['name'];
        if (isset($inputs['address'])) {
            $salon->address = $inputs['address'];
        }
        if (isset($inputs['description'])) {
            $salon->description = $inputs['description'];
        }

        if (isset($inputs['open_hour'])) {
            $salon->open_hour = $inputs['open_hour'];
        }
        if (isset($inputs['close_hour'])) {
            $salon->close_hour = $inputs['close_hour'];
        }

        if (isset($inputs['user_id'])) {
            $salon->user_id = $inputs['user_id'];
            $owner= User::find($inputs['user_id']);
            $owner->salon_owner=1;
            $owner->save();
        }
        $salon->main_photo = $inputs['main_photo'];
        $salon->save();
    }

    public function getPaginate($n)
    {
        return $this->salon->with('user')->paginate($n);
    }

    public function store(Array $inputs)
    {
        $salon = new $this->salon;
        $this->save($salon, $inputs);
        return $salon;
    }

    public function getById($id)
    {

        return $this->salon->with('artisans','user', 'services')->findOrFail($id);
    }

    public function update($salon, Array $inputs)
    {
        $this->save($salon, $inputs);
    }

    public function destroy(PhotoRepository $photoRepository, $id)
    {
        $salon = $this->getById($id);
        $photoRepository->delete_photo($salon->main_photo);
        foreach ($salon->artisans as $artisan) {
            $photoRepository->delete_photo($artisan->main_photo);
            $artisan->delete();
        }
        foreach ($salon->services as $service) {
            $service->delete();
        }
        $salon->delete();
    }
}