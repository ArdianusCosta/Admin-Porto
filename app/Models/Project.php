<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['foto_project','judul_project','isi_project','url_project','urutan_project'];

    public function bahasa()
    {
        return $this->belongsToMany(Bprogram::class, 'project_bahasa', 'project_id', 'bahasa_id')->withTimestamps();
    }    
}
