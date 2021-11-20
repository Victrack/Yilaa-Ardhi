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

    <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="{{ URL::asset('assets/img/bg/bg2.jpg') }}" data-speed="0.7">
        <div class="section-inner pad-top-200">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mt30 wow text-center">
                        <h2 class="section-heading">Lands in use</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="white-bg">
        <div class="container">
            <div class="row-reverse justify-content-center" style="z-index: 20; margin:10px; padding: 10px; ">
                <div class="widget mb80 " style="text-align: center; background-color: black; height: 70px; color: white;">
                    <div class="tagcloud">
                        <br>
                       {{ $terrains->links() }}
                    </div>
                </div>
                @foreach($terrains as $terrain)
                <div class="col-lg-4 col-md-6 col-xl-3 col-sm-12" style="text-align: center; z-index: 20;background-color: white; padding: 10px;">
                    <div class="col-xs-12" style="text-align: center; z-index: 20;background-color: #dfdfdf; margin: 10px; padding: 10px;">
                        <div class="hover-item mb30">
                            <img src="{{ url('/storage/'.$terrain->photo) }}" class="img-responsive smoothie" alt="PARCELLE N° {{ $terrain->numTerrain }}">
                            <div class="overlay-item-caption smoothie"></div>
                            <div class="hover-item-caption smoothie">
                                <h3 class="vertical-center smoothie"><a href="{{ route('terrain_details',[$terrain->id]) }}" class="smoothie btn btn-primary page-scroll" title="view article">PARCELLE N° {{ $terrain->numTerrain }}</a></h3>
                            </div>
                        </div>

                        {{--<h2 class="post-title"></h2>--}}
                        <div class="item-metas text-muted mb10" style="background-color: #2b542c; color: white; text-align: center">
                            <span class="meta-item">OWNER : <span>{{ $terrain->nom }} {{ $terrain->prenom }} </span></span>
                        </div>
                        <a class="btn btn-primary mt30" href="{{ route('terrain_details',[$terrain->id]) }}">More Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


