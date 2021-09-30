<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jidu extends Model
{
    use HasFactory;
    protected $table = 'jidu';
    public $timestamps = false;


    public static function getYear()
    {
        $list = DB::select('Select DISTINCT YEAR(date) as year FROM `jidu` ORDER by date desc;');
        return $list;
    }
}