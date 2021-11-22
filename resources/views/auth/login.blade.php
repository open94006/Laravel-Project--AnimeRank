@extends('layouts.master')
@section('title', '登入畫面')
@section('container')
<div id="fh5co-intro">
    <h2>會員登入</h2>
    <br>
    <form action="{{ route('auth.check') }}" method="post">
        @csrf
        <div id="result">
            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            @endif
            @if(Session::get('login'))
            <div class="alert alert-info">
                {{Session::get('login')}}
            </div>
            @endif
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
            <input type="submit" value="登入">
            <input type="reset">
        </div>
        <div class="form-group">
            <a href={{ route('auth.register') }}>沒有帳號嗎？點此註冊一個新帳號</a>
        </div>
    </form>
</div>
@endsection