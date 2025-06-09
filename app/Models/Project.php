<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['foto_project','judul','deskripsi_project','tool_id','url_project'];

    public function tool_id(): BelongsToMany
    {
        return $this->belongsToMany(Tool::class);
    }
}

