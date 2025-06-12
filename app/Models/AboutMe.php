<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $fillable = ['judul','isi','nama_isi','foto_about_me','project_selesai','tahun_pengalaman'];
}
