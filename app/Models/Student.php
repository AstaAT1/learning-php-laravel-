<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;




class Student extends Model
{

    use HasFactory;

protected $fillable = [
  'name','email','phone','age','school','gender','english','campus','terms'
];

protected $casts = [
  'school' => 'array',
  'terms' => 'boolean',
];


}
