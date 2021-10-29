<?php

namespace App\Http\Controllers;

use App\Models\tellus;
use Illuminate\Http\Request;

class TellusController extends Controller
{
    public static function index()
    {
        return view('tellus.index');
    }

    public static function store(Request $request)
    {
        if (tellus::storeTellus($request)) {
            return redirect()->route('tellus.index')->with('success', '系統提示：您的意見已送出！');
        } else {
            return redirect()->route('tellus.index')->with('fail', '系統提示：發生錯誤');
        }
    }
}