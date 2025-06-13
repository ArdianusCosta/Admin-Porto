<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = ['judul','isi','foto_home'];

    public function motivasi()
    {
        return $this->hasOne(Motivasi::class);
    }
}
