<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CbaseUpload extends Model
{
    protected $table = 'cbase';
    protected $fillable = ['subcategory', 'file_name', 'file_path'];
}
