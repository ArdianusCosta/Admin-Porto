<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivasi extends Model
{
    use HasFactory;

    protected $fillable = ['home_id','foto_motivasi','motivasi'];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
