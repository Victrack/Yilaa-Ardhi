
@extends('layouts.app')

@section('content')

    <style>
        input[type="search"] {
            width: 320px;
            color: black;
            background: rgba(0, 0, 0, 0);
            font-size: 14px;
            font-weight: 700;
            text-align: left;
            border: 0;
            margin: 0 auto;
            margin-top: 0;
            padding-left: 0;
            padding-bottom: 13px;
            outline: none;
            border-bottom: 3px solid #000000;
            display: inline;
            text-transform: uppercase;
        }
    </style>

    <header id="headerwrap" class="dark-wrapper backstretched special-max-height no-overlay">
        <div class="container vertical-center">
            <div class="intro-text vertical-center text-left smoothie">
                <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.2s">Yilaa Ardhi</div>
                <div class="intro-sub-heading wow fadeIn secondary-font" data-wow-delay="0.4s">See our <span class="rotate"> &nbsp;projects, &nbsp;lands, &nbsp;projects and lands submited</span></div>
            </div>
        </div>
    </header>

        <script type="text/javascript">
            var locations =
                [
                    @foreach ($coordonnee as $coordonne)
                        [ {{ $coordonne->latitude }}, {{ $coordonne->longitude }} ],
                    @endforeach
                ];
//                addMaker(lat,lon);
        </script>

    <section>
        <div class="text-center">
            <form>
                <input type="search" value="" placeholder="Enter Search Term"/>
                <button type="" class="btn btn-primary btn-black" >Search</button>
            </form>
        </div>
        <div id="omap">
            <!-- Ici s'affichera la carte -->
        </div>
    </section>

@endsection