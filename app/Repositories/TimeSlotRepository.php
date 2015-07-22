<?php
namespace App\Repositories;

use App\TimeSlot;

class TimeSlotRepository
{
    protected $timeslot;

    public function __construct(TimeSlot $timeslot)
    {
        $this->timeslot = $timeslot;
    }

    private function save(TimeSlot $timeslot, Array $inputs)
    {
        $timeslot->day= $inputs['day'];
        $timeslot->from_hour = $inputs['from_hour'];
        $timeslot->to_hour = $inputs['to_hour'];
        $timeslot->service_id = $inputs['service_id'];
        $timeslot->artisan_id = $inputs['artisan_id'];
        $timeslot->save();
    }

    public function getPaginate($n)
    {
        return $this->timeslot->paginate($n);
    }

    public function store(Array $inputs)
    {
        $timeslot = new $this->timeslot;
        $this->save($timeslot, $inputs);

        return $timeslot;
    }

    public function getById($id)
    {
        return $this->timeslot->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    //à compléter en temps voulu
    public function checkdates($start,$end)
    {
        return true;
    }
}