<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolPakai extends Model
{
    use HasFactory;

    protected $fillable = ['tool_id','judul_tool','foto_tool','deskripsi_tool'];

    public function tool_id()
    {
        return $this->belongsTo(Tool::class);
    }
}
