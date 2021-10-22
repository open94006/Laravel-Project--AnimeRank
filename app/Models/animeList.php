<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class animeList extends Model
{
    use HasFactory;
    protected $table = 'anime';
    protected $fillable = ['id', 'name', 'aired', 'studios', 'tag', 'url'];

    public static function storeAnime(Request $request)
    {
        $animeList = new animeList;
        $animeList->name = $request->input('name');
        $animeList->aired = $request->input('aired');
        $animeList->studios = $request->input('studios');
        $animeList->tag = $request->input('tag');
        $animeList->url = $request->input('url');
        if ($animeList->save()) {
            animeList::newJidu($request->input('aired'));
            score::storeScore($animeList->id, $request);
            return True;
        } else {
            return false;
        }
    }

    public static function updateAnime(Request $request, $id)
    {
        $data = $request->all();
        if (animeList::find($id)->update($data)) {
            score::updateScore($id, $request);
            animeList::newJidu($request->input('aired'));
            return True;
        } else {
            return false;
        }
    }

    public static function newJidu($date)
    {
        $new = new jidu;
        $m = substr($date, 5, 2);
        if ($m == '01' or $m == '02' or $m == '03') {
            $name = substr($date, 0, 4) . '年01月新番';
        } elseif ($m == '04' or $m == '05' or $m == '06') {
            $name = substr($date, 0, 4) . '年04月新番';
        } elseif ($m == '07' or $m == '08' or $m == '09') {
            $name = substr($date, 0, 4) . '年07月新番';
        } else {
            $name = substr($date, 0, 4) . '年10月新番';
        }
        if (!jidu::where('fullname', $name)->get()->count()) {
            $new->fullname = $name;
            $new->date = mb_substr($name, 0, 4, "UTF-8") . '-' . mb_substr($name, 5, 2, "UTF-8") . '-01';
            $new->save();
        }
    }

    public static function getAnimejidu($jidu)
    {
        $date = jidu::where('fullname', $jidu)->firstorfail();
        $start = date("Y-m-d", strtotime("$date->date-15 day"));
        $end = date("Y-m-d", strtotime("$start+3 month"));
        $list = animeList::whereBetween('aired', [$start, $end])->orderBy('aired', 'desc')->get();
        return $list;
    }

    public static function getAnimeYear($year)
    {
        $list = animeList::join('score', 'anime.id', '=', 'score.anime_id')
            ->whereYear('aired', $year)
            ->select('anime.id', 'name', 'aired', DB::raw("worldview+figure+script+produce+will+durable as point"))
            ->orderBy('point', 'desc')
            ->get();
        return $list;
    }
}