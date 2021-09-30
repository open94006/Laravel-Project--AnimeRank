@extends('layouts.master')
@section('title', '加入動畫')
@section('container')
<div id="fh5co-intro">
    <h2>新增動畫</h2><br>
    <div id="result">
        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif
    </div>
    <form method="POST" action="{{ route('animeList.store') }}">
        @csrf
        {{-- 動畫名稱 --}}
        <label>動畫名稱：&thinsp;</label>
        <input type="text" name="name" required />
        <span class="text-danger">@error('name'){{ $message }} @enderror</span><br>
        {{-- 開播日期 --}}
        <label>開播日期：&thinsp;</label>
        <input type="date" name="aired" required /><br>
        {{-- 製作公司 --}}
        <label>製作公司：&thinsp;</label>
        <input type="text" name="studios" required /><br>
        {{-- 標籤 --}}
        <label>標籤：&emsp;&emsp;&thinsp;</label>
        <input type="text" name="tag" required /><br>
        {{-- 線上看網址 --}}
        <label>線上看url：</label>
        <input type="url" name="url" required /><br>
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
                <td><input type="number" min="0" max="10" name="worldview" required /></td>
                <td><input type="number" min="0" max="10" name="figure" required /></td>
                <td><input type="number" min="0" max="10" name="script" required /></td>
                <td><input type="number" min="0" max="10" name="produce" required /></td>
                <td><input type="number" min="0" max="10" name="will" required /></td>
                <td><input type="number" min="0" max="10" name="durable" required /></td>
            </tbody>
        </table>
        <br>
        <input type="submit" value="確認送出">
        <input type="reset">
    </form>
</div>
@endsection