@extends('layouts.app')


@section('content')
    <style>
        nav {
            background-color: black;
        }
        /*.master-wrapper{*/
            /*background-color: darkslategray;*/
        /*}*/
        .pagination{
            background-color: transparent;
        }
    </style>

    <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="assets/img/bg/bg2.jpg" data-speed="0.7">
        <div class="section-inner pad-top-200">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mt30 wow text-center">
                        <h2 class="section-heading">Ongoing Projects</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="white-bg">
        <div class="container">
            <div class="row-reverse justify-content-center" style=" z-index: 20; margin:10px; padding: 10px; ">
                <div class="widget mb80 " style="text-align: center; background-color: black; height: 70px; color: white;">
                    <div class="tagcloud">
                        <br>
                       {{ $projets->links() }}
                    </div>
                </div>
                @foreach($projets as $projet)
                <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12" style="text-align: center; z-index: 20;background-color: white; padding: 10px;">
                    <div class="col-xs-12" style="text-align: center; z-index: 20;background-color: #dfdfdf; margin: 10px; padding: 10px;">
                        {{--<div class="hover-item mb30">--}}
                            {{--<img src="assets/img/news/1.jpg" class="img-responsive smoothie" alt="title">--}}
                            {{--<div class="overlay-item-caption smoothie"></div>--}}
                            {{--<div class="hover-item-caption smoothie">--}}
                                {{--<h3 class="vertical-center smoothie"><a href="single-post-right-sidebar.html" class="smoothie btn btn-primary page-scroll" title="view article">{{ $projet->nom }}</a></h3>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <h2 class="post-title">{{ $projet->nom }}</h2>
                        <div class="item-metas text-muted mb30" style="background-color: #2b542c; color: white; text-align: center">
                            <span class="meta-item">START <span>{{ $projet->datedebutprevu }}</span> END <span>{{ $projet->datefinprevu }}</span></span>
                            <br>
                            {{--<span class="meta-item"><i class="pe-icon pe-7s-user"></i> AUTHOR <span>Danny Jones</span></span>--}}
                        </div>
                        <p s
                           tyle="height: 100px;">{{ substr(strip_tags($projet->description), 0, 230) }}</p>
                        <a class="btn btn-primary mt30" href="{{ route('projects_details',[$projet->id]) }}">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


