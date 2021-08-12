<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yetkinlikModel extends Model
{
    use HasFactory;
    protected $table = 'yetkinlik';
    protected $primaryKey = 'yetkinlikid';
    public $timestamps = false;
    protected $guarded = [];
}
