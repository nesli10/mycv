<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class egitimModel extends Model
{
    use HasFactory;
    protected $table = 'egitim';
    protected $primaryKey = 'egitimİd';
    public $timestamps = false;
    protected $guarded = [];

}
