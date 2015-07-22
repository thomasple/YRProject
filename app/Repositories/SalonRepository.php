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
        if (isset($inputs['owner_id'])) {
            $salon->owner_id = $inputs['owner_id'];
            //$owner=Salon::find($salon->id)->owner;
            //$owner
        }
        $salon->main_photo = $inputs['main_photo'];
        $salon->save();
    }

    public function getPaginate($n)
    {
        return $this->salon->paginate($n);
    }

    public function store(Array $inputs)
    {
        $salon = new $this->salon;
        $this->save($salon, $inputs);
        return $salon;
    }

    public function getById($id)
    {
        return $this->salon->findOrFail($id);
    }

    public function update(PhotoRepository $photoRepository, $id, Array $inputs)
    {
        $photoRepository->delete_photo($this->getById($id)->main_photo);
        $this->save($this->getById($id), $inputs);
    }

    public function destroy(PhotoRepository $photoRepository, $id)
    {
        $photoRepository->delete_photo($this->getById($id)->main_photo);
        $this->getById($id)->delete();
    }
}