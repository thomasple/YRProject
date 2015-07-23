<?php
namespace App\Repositories;
use App\Holiday;

class HolidayRepository
{

    protected $holiday;

    public function __construct(Holiday $holiday)
        {
        $this->holiday = $holiday;
    }

    private function save(Holiday $holiday, Array $inputs)
    {
        $holiday->start = $inputs['start'];
        $holiday->end = $inputs['end'];
        $holiday->artisan_id = $inputs['artisan_id'];
        $holiday->description = $inputs['description'];
        $holiday->save();
    }

    public function getPaginate($n)
    {
        return $this->holiday->paginate($n);
    }

    public function store(Array $inputs)
    {
        $holiday = new $this->holiday;
        $this->save($holiday, $inputs);

        return $holiday;
    }

    public function getById($id)
    {
        return $this->holiday->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    //à compléter
    public function checkdates($start,$end)
    {
        return true;
        //if()
    }
}