@extends('layouts.master')
@section('title', '意見箱')
@section('container')
<div id="fh5co-intro">
    <h2>意見箱</h2>
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
    <br>
    <form action="{{ route('tellus.store') }}" method="post" onsubmit="return confirm('確認送出意見嗎？')">
        @csrf
        <div class="form-group">
            <label for="name">姓名</label>
            <input type="text" name="name" value="{{ old('name') }}" required><br>
        </div>
        <div class="form-group">
            <label for="email">信箱</label>
            <input type="email" name="email" value="{{ old('email') }}" required><br>
        </div>
        <div class="tellus1">
            <label for="description">意見</label>
        </div>
        <div class="tellus2">
            <textarea name="description" value="{{ old('description') }}" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="送出意見">
            <input type="reset">
        </div>
    </form>
</div>
@endsection