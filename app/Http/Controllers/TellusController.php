<?php

namespace App\Http\Controllers;

use App\Mail\TellusMail as TellusMail;
use App\Models\tellus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TellusController extends Controller
{
    public static function index()
    {
        return view('tellus.index');
    }

    public static function store(Request $request)
    {
        if (tellus::storeTellus($request)) {

            $details = [
                'title' => '以下是您在AnimeRank意見箱的備份，此郵件為自動寄出，請勿回覆。',
                'body' => $request->input('description'),
            ];

            Mail::to($request->input('email'))->send(new TellusMail($details));


            return redirect()->route('tellus.index')->with('success', '系統提示：您的意見已送出！');
        } else {
            return redirect()->route('tellus.index')->with('fail', '系統提示：發生錯誤');
        }
    }

    public function sendMail(Request $request)
    {
    }
}