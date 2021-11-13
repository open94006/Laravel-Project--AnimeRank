@extends('layouts.master')
@section('title', '首頁')
@section('container')
<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(images/Hunter.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1>《獵人 Hunter x Hunter》本網站第一個滿分作品！</h1>
                                <h2><a href="animeList/show/89" target="_blank">從1999年放到現在還是好看，才叫經典</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/jujutsu.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1>王道套路邪道內容<br>《咒術迴戰》</a></h1>
                                <h2><a href="animeList/show/85" target="_blank">善惡互為表裡、口是心非、亦正亦邪才是人類的本質</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/86.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1>我，只希望你能活下去《86-不存在的戰區-》</a></h1>
                                <h2><a href="animeList/show/131" target="_blank">小說第一卷堪稱完整度最高的戰爭動畫</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/Abyss.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1>願詛咒與祝福與你共存...《來自深淵》</h1>
                                <h2><a href="animeList/show/3" target="_blank">黑深殘卻總能帶給你希望的深淵</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
@endsection