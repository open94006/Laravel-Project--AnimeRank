@extends('layouts.master')
@section('title', '排行榜')
@section('container')
<div id="fh5co-intro">
    <h2>排行榜</h2><br>
    <a>選擇年度：</a>
    <select id="year" onchange="animeYearList()">
        <option>==請選擇年度==</option>
        @foreach ($yearlist as $item)
        @if ($item->year != 1970)
        <option>{{ $item->year }}年</option>
        @endif
        @endforeach
    </select>
</div>
<div id="WRAPPER">
    <div id="BOX">
        <table id="box_table">
            <thead>
                <th colspan=2>一月新番</th>
            </thead>
            <tbody id="body_A">
            </tbody>
        </table>
        <br>
    </div>
    <div id="BOX">
        <table id="box_table">
            <thead>
                <th colspan=2>四月新番</th>
            </thead>
            <tbody id="body_B">
            </tbody>
        </table>
        <br>
    </div>
</div>
<div id="WRAPPER">
    <div id="BOX">
        <table id="box_table">
            <thead>
                <th colspan=2>七月新番</th>
            </thead>
            <tbody id="body_C">
            </tbody>
        </table>
        <br>
    </div>
    <div id="BOX">
        <table id="box_table">
            <thead>
                <th colspan=2>十月新番</th>
            </thead>
            <tbody id="body_D">
            </tbody>
        </table>
        <br>
    </div>
</div>
@endsection