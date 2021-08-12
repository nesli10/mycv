<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hakkimdaModel extends Model
{
    use HasFactory;
    protected $table = 'hakkimda';
    protected $primaryKey = 'hakkimdaid';
    public $timestamps = false;
    protected $guarded = [];
}
