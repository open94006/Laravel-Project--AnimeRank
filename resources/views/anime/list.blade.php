@extends('layouts.master')
@section('title', '動畫清單')
@section('container')
<div id="fh5co-intro">
    <h2>動畫清單</h2><br>
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
    <div style="overflow-x: auto;">
        <div class="menu1">
            <a>選擇季度&emsp;</a>
            <select id="jidu" onchange="getJidulist()">
                <option>===請選擇季度===</option>
                @foreach ($jidu as $jidu_list)
                <option>{{ $jidu_list->fullname }}</option>
                @endforeach
            </select>
        </div>
        <div class="menu2">
            <a>快速搜尋&emsp;</a><input type="text" id="search" placeholder="動畫名稱、製作公司" maxlength="25">
        </div>
        <div class="menu3">
            <a href="{{ route('animeList.create') }}" class="btn btn-info btn-sm">新增動畫</a>
        </div>
    </div>
    <div style="overflow-x: auto;">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col" width="22%">動畫名稱</th>
                    <th scope="col" width="7%" class="rwd">開播日期</th>
                    <th scope="col" width="15%" class="rwd">製作公司</th>
                    <th scope="col" colspan=3 width="15%">動作</th>
                </tr>
            </thead>
            <tbody id="animeList">
            </tbody>
        </table>
    </div>
</div>
@endsection