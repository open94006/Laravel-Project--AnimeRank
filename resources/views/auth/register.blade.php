@extends('layouts.master')
@section('title', '註冊畫面')
@section('container')
<div id="fh5co-intro">
    <h2>會員註冊</h2>
    <br>
    <form action="{{ route('auth.create') }}" method="post">
        @csrf
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
        <div class="form-group">
            <label for="email">姓名</label>
            <input type="text" name="name" value="{{ old('name') }}"><br>
            <span class="text-danger">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="email">信箱</label>
            <input type="email" name="email" value="{{ old('email') }}"><br>
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="email">密碼</label>
            <input type="password" name="password" value="{{ old('password') }}"><br>
            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <input type="submit" value="註冊">
            <input type="reset">
        </div>
        <div class="form-group">
            <a href={{ route('auth.login') }}>回到登入頁面</a>
        </div>
    </form>
</div>
@endsection