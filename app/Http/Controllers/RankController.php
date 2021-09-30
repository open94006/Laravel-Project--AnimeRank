<?php

namespace App\Http\Controllers;

use App\Models\animeList;
use App\Models\jidu;

class RankController extends Controller
{
    public function index()
    {
        return view('rank.list', ['yearlist' => jidu::getYear()]);
    }

    public function getanimeYear($year)
    {
        return animeList::getAnimeYear($year);
    }
}