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
    <table id="menu">
        {{-- 選擇季度select --}}
        <td width="30%" align="left">
            <a>選擇季度：</a>
            <select id="jidu" onchange="getJidulist()">
                <option>===請選擇季度===</option>
                @foreach ($jidu as $jidu_list)
                <option>{{ $jidu_list->fullname }}</option>
                @endforeach
            </select>
        </td>
        <td width="60%">
        </td>
        <td width="10%">
            <a href="{{ route('animeList.create') }}" class="btn btn-info btn-sm">新增動畫</a>
        </td>
    </table>
    <div style="overflow-x: auto;">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col" width="22%">動畫名稱</th>
                    <th scope="col" width="7%" class="rwd">開播日期</th>
                    <th scope="col" width="15%" class="rwd">動畫製作</th>
                    <th scope="col" colspan=3 width="15%">動作</th>
                </tr>
            </thead>
            {{-- 在tbody使用AJAX生成該季度動畫 --}}
            <tbody id="animeList">
            </tbody>
        </table>
    </div>
</div>
@endsection