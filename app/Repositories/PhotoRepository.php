<?php
namespace App\Repositories;

class PhotoRepository
{
    public function compute_photo($photo)
    {
        if ($photo->isValid()) {
            $path = config('images.path');
            $extension = $photo->getClientOriginalExtension();

            do {
                $name = str_random(10) . '.' . $extension;
            } while (file_exists($path . '/' . $name));
            $photo->move($path, $name);
            return $path . '/' . $name;
        }
        return false;
    }

    public function create_photo($file)
    {
        if ($file != null) {
            $main_photo = $this->compute_photo($file);
        } else {
            $main_photo = config('images.anonym');
        }
        return $main_photo;
    }

    public function update_photo($file, $input, $salon)
    {
        if ($file!=null) {
            $this->delete_photo($salon->main_photo);
            $main_photo = $this->compute_photo($file);
        } else {
            $main_photo = $input['current_photo'];
        }
        return $main_photo;
    }

    public function delete_photo($photo)
    {
        if ($photo != config('images.anonym')) {
            \File::delete($photo);
        }
    }
    public function delete_all_main_photos($objects){
        foreach($objects as $object){
            $this->delete_photo($object->main_photo);
        }
    }

}