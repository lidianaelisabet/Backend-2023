<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
   use HasFactory;

   protected $fillable = ['id','nama', 'gender', 'no_HP', 'alamat', 'email', 'status'];
}
