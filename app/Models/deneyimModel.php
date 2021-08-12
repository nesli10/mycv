<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deneyimModel extends Model
{
    use HasFactory;
    protected $table = 'deneyim';
    protected $primaryKey = 'deneyimid';
    public $timestamps = false;
    protected $guarded = [];
    
}
