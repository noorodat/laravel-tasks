<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Http\Controllers\PetController;

class Pet extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'image',
        'animal',
        'breed',
        'age'
    ];
}
