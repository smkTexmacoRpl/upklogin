<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $primaryKey = 'no_kamar';
    protected $fillable =['jenis_kamar','harga'];

}
