<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

      protected $table = 'opportunity';

    protected $fillable = [
        'kategori',
        'jumlah',
        'wilayah',
    ];
}
