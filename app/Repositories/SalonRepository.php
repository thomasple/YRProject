<?php
namespace App\Repositories;
use App\Salon;

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
        if(isset($inputs['ownerid']))
        {
            $salon->owner_id=$inputs['ownerid'];
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