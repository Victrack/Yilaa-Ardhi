@extends('layouts.app')


@section('content')
    <style>
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
                        <h2 class="section-heading">LAND N° {{ $terrain->numTerrain }}</h2>
                        <div class="item-metas text-muted mb30 white">
                            <span class="meta-item"><i class="pe-icon pe-7s-user"></i> OWNER
                                    <span>{{ $terrain->nom }}  {{ $terrain->prenom }},</span>
                            </span>
                            <br>
                            <span class="meta-item"><i class="pe-icon pe-7s-comment"></i> N° STATE <span>{{ $terrain->numEtatLieu }}</span></span>
                            <br>
                            <span class="meta-item post-date"><i class="pe-icon pe-7s-clock"></i> IS BUILT
                                <span>
                                    @if($terrain->batie==1)
                                        YES
                                    @else
                                        NO
                                    @endif
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="white-bg">
        <div class="container">
            <div class="row justify-content-center" style="z-index: -10; margin:10px; padding: 0px; height: 350px">
                <div class="col-sm-12 single-post-content">
                    {{--{{$terrain->photo}}--}}
                    {{--{{ url('/storage/').'/terrains/August2021/b0OzDQLexKQlqQErckQ8.png' }}--}}
                    {{--{{ url('/storage/').'/'.$terrain->photo }}--}}
                    <div class="hover-item mb30 post-slide">
                        <img src="{{ url('/storage/').'/'.$terrain->photo }}" class="img-responsive smoothie" alt="title">
                    </div>
                    <div class="overlay-item-caption smoothie"></div>
                    {{--<div class="hover-item-caption smoothie">--}}
                    {{--<div class="vertical-center smoothie">--}}
                    {{--<h3 class="smoothie mb30"><a href="#" title="view project">{{ $croqui->nom }}</a></h3>--}}
                    {{--<a href="{{ url('/storage/'.$croqui->croquis) }}" title="View Gallery" class="btn btn-primary lb-link smoothie">Zoom</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <ul class="owl-carousel-paged wow fadeIn list-unstyled post-slider" data-items="3" data-items-desktop="[1200,3]" data-items-desktop-small="[980,3]" data-items-tablet="[768,2]" data-items-mobile="[479,1]">
                        @foreach($croquis as $croqui)
                            <li class="portfolio-item nopadding-lr design isotope-item hover-item">
                                <div class="hover-item mb30 post-slide">
                                    <img src="{{ url('/storage/'.$croqui->croquis) }}" class="img-responsive smoothie" alt="title">
                                </div>
                                <div class="overlay-item-caption smoothie"></div>
                                <div class="hover-item-caption smoothie">
                                    <div class="vertical-center smoothie">
                                        <h3 class="smoothie mb30"><a href="#" title="view project">{{ $croqui->nom }}</a></h3>
                                        <a href="{{ url('/storage/'.$croqui->croquis) }}" title="View Gallery" class="btn btn-primary lb-link smoothie">Zoom</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    
                    {{--@foreach($coordonnee as $coordonne)--}}
                    {{--<?php echo '--}}
                    {{--<script type="text/javascript">--}}
                    {{--alert("bonjour");--}}
                    {{--var lat ='.$coordonne->latitude.';--}}
                    {{--var long ='.$coordonne->longitude.';--}}
                    {{----}}
                    {{--</script>'--}}
                    {{--?>--}}
                    {{--@endforeach--}}
                    <div id="omap">
                        <!-- Ici s'affichera la carte -->
                    </div>
                    -
                    <div data-easyshare data-easyshare-url="{{ route('terrain_details',[$terrain->id]) }}">

                        <!-- Facebook -->
                        <button data-easyshare-button="facebook">
                            <span>Share</span>
                        </button>
                        <span data-easyshare-button-count="facebook">0</span>

                        <!-- Twitter -->
                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                            <span>Tweet</span>
                        </button>
                        <span data-easyshare-button-count="twitter">0</span>

                        <div data-easyshare-loader>Loading...</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
