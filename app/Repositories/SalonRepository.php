<?php
namespace App\Repositories;
use App\Salon;
use App\User;
class SalonRepository
{
    protected $salon;

    public function __construct(Salon $salon)
    {
        $this->salon=$salon;
    }
    private function save(Salon $salon, Array $inputs)
    {
        $salon->name=$inputs['name'];
        if(isset($inputs['address']))
        {
            $salon->address=$inputs['address'];
        }
        if(isset($inputs['description']))
        {
            $salon->description=$inputs['description'];
        }
        if(isset($inputs['owner_id']))
        {
            $salon->owner_id=$inputs['owner_id'];
            $owner= User::find($inputs['owner_id']);
            $owner->salon_owner=1;
            $owner->save();
        }
        if(isset($inputs['main_photo']))
        {
            $image=$inputs['main_photo'];
            if($image->isValid())
            {
                $chemin = config('salonImage.path');
                $extension = $image->getClientOriginalExtension();
                $nom = 'photosalon' . $salon->id . '.' . $extension;
                $image->move($chemin, $nom);
                $salon->main_photo=$nom;
            }
        }
        $salon->save();
    }

    public function getPaginate($n)
    {
        return $this->salon->paginate($n);
    }
    public function store(Array $inputs)

    {
        $salon=new $this->salon;
        $this->save($salon,$inputs);
        return $salon;
    }
    public function getById($id)
    {
        return $this->salon->findOrFail($id);
    }
    public function update($id,Array $inputs)
    {
        $this->save($this->getById($id),$inputs);
    }
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }
}