<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = ['judul','isi'];

    public function toolpakai()
    {
        return $this->hasMany(ToolPakai::class);
    }
}
