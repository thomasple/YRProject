<?php
namespace App\Repositories;
use App\Salon;
class AdminCreationSalonRepository implements  AdminCreationSalonRepositoryInterface
{
    public function createSalon($sname)
    {
        $salon=new Salon;
        $salon->name=$sname;
        $salon->save();
    }
}