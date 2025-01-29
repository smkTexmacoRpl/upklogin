<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $primaryKey = 'id_pengunjung';
    public $incrementing    = false;
    protected $fillable =['id_pengunjung','nama_pengunjung','alamat','JK','no_tlp','no_ktp'];
}
