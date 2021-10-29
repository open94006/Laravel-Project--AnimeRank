<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class tellus extends Model
{
    use HasFactory;
    protected $table = 'tellus';

    public static function storeTellus(Request $request)
    {
        $tellus = new tellus;
        $tellus->name = $request->input('name');
        $tellus->email = $request->input('email');
        $tellus->desc = $request->input('description');
        if ($tellus->save()) {
            return true;
        } else {
            return false;
        }
    }
}