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
        $list = DB::table('jidu')->selectRaw('YEAR(date) as year')->groupBy('year')->orderBy('year', 'desc')->get();
        return $list;
    }
}