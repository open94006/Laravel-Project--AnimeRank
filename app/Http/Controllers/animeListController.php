<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\animeList;
use App\Models\jidu;
use App\Models\score;

class animeListController extends Controller
{

    public function index()
    {
        return view('anime.list', [
            'animeList' => animeList::orderby('aired', 'desc')->get(),
            'jidu' => jidu::orderBy('fullname', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('anime.create');
    }

    public function show($id)
    {
        if (animeList::find($id)) {
            return view('anime.show', [
                'show' => animeList::find($id),
                'score' => score::where('anime_id', $id)->firstorfail()
            ]);
        } else {
            return redirect()->route('animeList.index')->with('fail', '系統提示：找不到該動畫，請從「動畫清單」中搜尋');
        }
    }

    public function Animejidu($jidu = null)
    {
        if (strpos($jidu, "新番") !== false) {
            return animeList::getAnimejidu($jidu);
        } else {
            return animeList::orderby('aired', 'desc')->get();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:anime',
        ]);

        if (animeList::storeAnime($request)) {
            return redirect()->route('animeList.index')->with('success', '系統提示：建立動畫「' . $request->input('name') . '」成功');
        } else {
            return redirect()->route('animeList.create')->with('fail', '系統提示：發生錯誤');
        }
    }

    public function update(Request $request, $id)
    {
        if (animeList::updateAnime($request, $id)) {
            return redirect()->route('animeList.show', $id)->with('success', '系統提示：修改動畫「' . $request->input('name') . '」成功');
        } else {
            return redirect()->route('animeList.show', $id)->with('fail', '系統提示：發生錯誤');
        }
    }

    public function destroy($id)
    {
        $data = animeList::find($id);
        if (score::destroyScore($id) && animeList::find($id)->delete()) {
            return redirect()->route('animeList.index')->with('success', '系統提示：刪除動畫「' . $data->name . '」成功');
        } else {
            return redirect()->route('animeList.index')->with('fail', '系統提示：發生錯誤');
        }
    }

    public function AnimeSearch($word = null)
    {
        return animeList::getanimeSearch($word);
    }
}