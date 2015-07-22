<?php
namespace App\Repositories;
use App\Reservation;

class ReservationRepository
{

    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    private function save(Reservation $reservation, Array $inputs)
    {
        $reservation->start = $inputs['start'];
        $reservation->end = $inputs['end'];
        $reservation->client_id = $inputs['client_id'];
        $reservation->artisan_service_id = $inputs['artisan_service_id'];
        $reservation->save();
    }

    public function getPaginate($n)
    {
        return $this->reservation->paginate($n);
    }

    public function store(Array $inputs)
    {
        $reservation = new $this->reservation;
        $this->save($reservation, $inputs);

        return $reservation;
    }

    public function getById($id)
    {
        return $this->reservation->findOrFail($id);
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
        //if()
    }
}