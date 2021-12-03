@extends('layouts.master')
@section('title', '詳細資料')
@section('container')
<div id="fh5co-intro">
    <h2>詳細/修改動畫</h2>
    <div id="result">
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif
    </div>
    <form method="POST" action="{{ route('animeList.update',[ 'id' => $show->id ]) }}">
        @method('PUT')
        @csrf
        {{-- 動畫名稱 --}}
        <label>動畫名稱：&thinsp;</label>
        <input type="text" name="name" value="{{ $show->name }}" disabled required /><br>
        {{-- 開播日期 --}}
        <label>開播日期：&thinsp;</label>
        <input type="date" name="aired" value="{{ $show->aired }}" disabled required /><br>
        {{-- 製作公司 --}}
        <label>製作公司：&thinsp;</label>
        <input type="text" name="studios" value="{{ $show->studios }}" disabled required /><br>
        {{-- 標籤 --}}
        <label>標籤：&emsp;&emsp;&thinsp;</label>
        <input type="text" name="tag" value="{{ $show->tag }}" disabled required /><br>
        {{-- 線上看網址 --}}
        <label>線上看url：</label>
        <input type="url" name="url" value="{{ $show->url }}" id="url" disabled required />
        <button onclick="copyEvent('url')" type="button">複製</button>
        <a class="alert" type="hidden"></a><br>
        {{-- 評分 --}}
        <label>評分：</label>
        <table>
            <thead>
                <th>世界觀</th>
                <th>人物</th>
                <th>劇情</th>
                <th>製作</th>
                <th>價值觀</th>
                <th>耐久度</th>
            </thead>
            <tbody>
                <td><input type="number" min="0" max="10" name="worldview" value="{{ $score->worldview }}" disabled />
                </td>
                <td><input type="number" min="0" max="10" name="figure" value="{{ $score->figure }}" disabled /></td>
                <td><input type="number" min="0" max="10" name="script" value="{{ $score->script }}" disabled /></td>
                <td><input type="number" min="0" max="10" name="produce" value="{{ $score->produce }}" disabled /></td>
                <td><input type="number" min="0" max="10" name="will" value="{{ $score->will }}" disabled /></td>
                <td><input type="number" min="0" max="10" name="durable" value="{{ $score->durable }}" disabled /></td>
            </tbody>
        </table>
        <p>（上次更新 {{ $score->last_update }}）</p>
        <input type="submit" value="確認送出" hidden>
    </form>
    <button onclick="enable_disable()">
        修改
    </button>
</div>
@endsection