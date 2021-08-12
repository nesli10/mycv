<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iletisimModel extends Model
{
    use HasFactory;
    protected $table = 'iletisim';
    protected $primaryKey = 'iletisimid';
    public $timestamps = false;
    protected $guarded = [];

}
