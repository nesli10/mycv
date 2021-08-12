<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sosyalmedyaModel extends Model
{
    use HasFactory;
    protected $table = 'sosyalmedya';
    protected $primaryKey = 'medyaid';
    public $timestamps = false;
    protected $guarded = [];

}
