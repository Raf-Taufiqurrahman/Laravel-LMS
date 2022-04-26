<?php

namespace App\Models;

use App\Traits\HasScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, HasScope;

    protected $fillable = ['name', 'slug', 'color'];
}
