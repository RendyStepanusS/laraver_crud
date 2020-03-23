<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ['nama_depan','nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar'];

    public function getAvatar()
    {
        if(!$this->avatar)
        {
            return asset('images/default.png');
        }

        return asset('images/'.$this->avatar);
    }
}
