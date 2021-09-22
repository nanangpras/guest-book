<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Guest extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'guests';
    protected $fillable = [
        'name', 'address', 'image', 'saying'
    ];
}
