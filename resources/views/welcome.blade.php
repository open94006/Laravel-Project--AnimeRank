@extends('layouts.master')
@section('title', '首頁')
@section('container')
<div id="fh5co-intro">
    <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 col-md-pull-2">
            <h2>對你喜歡的動畫排行吧！</h2>
        </div>
    </div>
</div>
<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(images/img_bg_1.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1><a href="#">Best showcase for architecture</a></h1>
                                <h2>Free html5 templates Made by <a href="http://freehtml5.co/"
                                        target="_blank">freehtml5.co</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/img_bg_2.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1><a href="#">Best showcase for architecture</a></h1>
                                <h2>Free html5 templates Made by <a href="http://freehtml5.co/"
                                        target="_blank">freehtml5.co</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/img_bg_3.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1><a href="#">Best showcase for architecture</a></h1>
                                <h2>Free html5 templates Made by <a href="http://freehtml5.co/"
                                        target="_blank">freehtml5.co</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(images/img_bg_4.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
                            <div class="slider-text-inner">
                                <h1><a href="#">Best showcase for architecture</a></h1>
                                <h2>Free html5 templates Made by <a href="http://freehtml5.co/"
                                        target="_blank">freehtml5.co</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
<div id="fh5co-portfolio">
    <div class="row nopadding">
        <div class="col-md-6 padding-right">
            <div class="row">
                <div class="col-md-12 animate-box">
                    <a href="single.html" class="portfolio-grid">
                        <img src="images/portfolio-1.jpg" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <div class="desc">
                            <h3>Dublin Arena Architect Project</h3>
                            <span>Building, Arena</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 animate-box">
                    <a href="single.html" class="portfolio-grid">
                        <img src="images/portfolio-4.jpg" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <div class="desc">
                            <h3>Dublin Arena Architect Project</h3>
                            <span>Building, Arena</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 animate-box">
                    <a href="single.html" class="portfolio-grid">
                        <img src="images/portfolio-5.jpg" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <div class="desc">
                            <h3>Dublin Arena Architect Project</h3>
                            <span>Building, Arena</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <div class="col-md-6 padding-left">
            <div class="row">
                <div class="col-md-12 animate-box">
                    <a href="single.html" class="portfolio-grid">
                        <img src="images/portfolio-2.jpg" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <div class="desc">
                            <h3>Dublin Arena Architect Project</h3>
                            <span>Building, Arena</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 animate-box">
                    <a href="single.html" class="portfolio-grid">
                        <img src="images/portfolio-3.jpg" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <div class="desc">
                            <h3>Dublin Arena Architect Project</h3>
                            <span>Building, Arena</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 animate-box">
                    <a href="single.html" class="portfolio-grid">
                        <img src="images/portfolio-6.jpg" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <div class="desc">
                            <h3>Dublin Arena Architect Project</h3>
                            <span>Building, Arena</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-12 animate-box">
                    <a href="single.html" class="portfolio-grid">
                        <img src="images/portfolio-7.jpg" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        <div class="desc">
                            <h3>Dublin Arena Architect Project</h3>
                            <span>Building, Arena</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection