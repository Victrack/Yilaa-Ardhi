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
                        <h2 class="section-heading">{{ $projet->nom }}</h2>
                        <div class="item-metas text-muted mb30 white">
                            <span class="meta-item"><i class="pe-icon pe-7s-folder"></i> PLANNED START <span>{{ $projet->datedebutprevu }}</span></span>
                            <span class="meta-item"><i class="pe-icon pe-7s-ticket"></i> END PLANNED <span>{{ $projet->datefinprevu }}</span></span>
                            <br>
                            <span class="meta-item"><i class="pe-icon pe-7s-user"></i> PARTNERS
                                @foreach($promoteurs as $promoteur)
                                    <span>{{ $promoteur->denomination }} : {{ $promoteur->role }},</span>
                                @endforeach
                            </span>
                            <br>
                            <span class="meta-item"><i class="pe-icon pe-7s-comment"></i> COMMENTS <span>3</span></span>
                            <br>
                            <span class="meta-item post-date"><i class="pe-icon pe-7s-clock"></i> POSTED <span>12th December, 2016</span></span>
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
                    <a href="{{ route('charts',[$projet->id]) }}" class="btn btn-primary">SEE EVOLUTION</a>
                    <p>{!! $projet->description !!}</p>
                    {{--<div class="col-sm-12" style="text-align: center;">--}}
                        {{--<div class="col-sm-4"><a href="{{ route('charts',[$projet->id]) }}" class="btn btn-primary">SEE EVOLUTION</a></div>--}}
                        {{--<p class="col-sm-4"><a href="#" class="btn btn-primary btn-theme page-scroll">SUBMIT LAND</a></p>--}}
                        {{--<p class="col-sm-4"><a href="#" class="btn btn-primary btn-theme page-scroll">BECOME PARTNER</a></p>--}}
                    {{--</div>--}}
                    <ul class="owl-carousel-paged wow fadeIn list-unstyled post-slider" data-items="3" data-items-desktop="[1200,3]" data-items-desktop-small="[980,3]" data-items-tablet="[768,2]" data-items-mobile="[479,1]">
                        @php($old_value = "")
                        @foreach($terrainProjets as $terrainProjet)
                            @if ( $terrainProjet->croquis != $old_value )
                                <li class="portfolio-item nopadding-lr design isotope-item hover-item">
                                    <div class="hover-item mb30 post-slide">
                                        <img src="{{ url('/storage/'.$terrainProjet->croquis) }}" class="img-responsive smoothie" alt="title">
                                    </div>
                                    <div class="overlay-item-caption smoothie"></div>
                                    <div class="hover-item-caption smoothie">
                                        <div class="vertical-center smoothie">
                                            <h3 class="smoothie mb30"><a href="#" title="view project">{{ $terrainProjet->nom }}</a></h3>
                                            <a href="{{ url('/storage/'.$terrainProjet->croquis) }}" title="View Gallery" class="btn btn-primary lb-link smoothie">Zoom</a>
                                        </div>
                                    </div>
                                </li>
                                <img id="tphoto" src="{{ url('/storage/').'/'.$terrainProjet->photo }}" class="img-responsive smoothie" alt="title" hidden="hidden" style="display: none;">
                                @php($old_value = $terrainProjet->croquis)
                            @endif
                        @endforeach
                    </ul>
                    <div class="section-inner">
                        <div class="container pad-sides-120">
                            <div class="row project-item wow">
                                @php($old_value = "")
                                @foreach($terrainProjets as $terrainProjet)
                                    @if ( $terrainProjet->obs != $old_value )
                                        <div class="col-sm-6">
                                            <p>{!! $terrainProjet->obs !!}</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><strong>SUPERFICIE : </strong> {{$terrainProjet->superficie}}</p>
                                            <p><strong>N° STATE : </strong> {{$terrainProjet->numEtatLieu}}</p>
                                            <p><strong>N° LAND : </strong> {{$terrainProjet->numTerrain}}</p>
                                            <p><strong>LOT : </strong> {{$terrainProjet->lot}}</p>
                                            <p><strong>OWNER : </strong> {{$terrainProjet->lot}}</p>
                                            @if($terrainProjet->batie <= 0)
                                                <p><strong>BATIE : </strong> NO </p>
                                            @else
                                                <p><strong>BATIE : </strong> YES </p>
                                            @endif
                                        </div>
                                        <div class="col-sm-3">
                                            <p><strong>COUNTRY :</strong> {{$terrainProjet->pays}}</p>
                                            <p><strong>ETAT :</strong> {{$terrainProjet->etat}}</p>
                                            <p><strong>DEPARTMENT :</strong> {{$terrainProjet->departement}} </p>
                                            <p><strong>TOWNSHIP :</strong> {{$terrainProjet->commune}} </p>
                                            <p><strong>DISTRICT :</strong> {{$terrainProjet->arrondissement}} </p>
                                            <p><strong>VILLAGE :</strong> {{$terrainProjet->village}} </p>
                                            <p><strong>VILLAGE :</strong> {{$terrainProjet->hameau}} </p>
                                        </div>
                                        {{--<div class="col-sm-12" style="text-align: center;">--}}
                                            {{--<p class="mt30"><a href="#contact" class="btn btn-primary btn-theme page-scroll">Visit Project</a></p>--}}
                                        {{--</div>--}}
                                        @php($old_value = $terrainProjet->obs)
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var latlngs =
                            [
                                @foreach ($coordonnee as $coordonne)
                                    [ {{ $coordonne->latitude }}, {{ $coordonne->longitude }} ],
                                @endforeach
                            ];
                    </script>
                    <div id="omap">

                    </div>
-
                    <div data-easyshare data-easyshare-url="{{ route('projects_details',[$projet->id]) }}">

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


