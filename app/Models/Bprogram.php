<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bprogram extends Model
{
    use HasFactory;

    protected $fillable = ['bahasa_pemrograman'];

   public function project()
   {
    return $this->belongsToMany(Project::class);
   }
}
