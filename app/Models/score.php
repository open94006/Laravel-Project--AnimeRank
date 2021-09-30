<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    use HasFactory;
    protected $table = 'score';
    public $timestamps = false;

    public static function storeScore($anime_id, $request)
    {
        $scoreList = new score;
        $scoreList->anime_id = $anime_id;
        $scoreList->worldview = $request->input('worldview');
        $scoreList->figure = $request->input('figure');
        $scoreList->script = $request->input('script');
        $scoreList->produce = $request->input('produce');
        $scoreList->will = $request->input('will');
        $scoreList->durable = $request->input('durable');
        $scoreList->save();
    }

    public static function updateScore($anime_id, $request)
    {
        $scoreList = score::where('anime_id', $anime_id)->firstorfail();
        $scoreList->worldview = $request->input('worldview');
        $scoreList->figure = $request->input('figure');
        $scoreList->script = $request->input('script');
        $scoreList->produce = $request->input('produce');
        $scoreList->will = $request->input('will');
        $scoreList->durable = $request->input('durable');
        $scoreList->save();
    }

    public static function destroyScore($anime_id)
    {
        if (score::where('anime_id', $anime_id)->delete()) {
            return True;
        } else {
            return false;
        }
    }
}