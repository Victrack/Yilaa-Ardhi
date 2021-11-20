
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
                        <h2 class="section-heading">Add Land</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="welcome">
        <div class="section-inner nopaddingbottom">

            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        {{--<p class="lead">Sold old ten are quit lose deal his sent. You correct how sex several far distant believe journey parties. We shyness enquire uncivil affixed it carried to. </p>--}}
                        {{--<p>End sitting shewing who saw besides son musical adapted. Contrasted interested eat alteration pianoforte sympathize was. He families believed if no elegance interest surprise an. It abode wrong miles an so delay plate.</p>--}}
                    </div>

                    <div class="col-md-6" style="border: 0px;">
                        <div id="message"></div>
                        <form method="post" action="{{ route('addLand') }}" enctype="multipart/form-data" role="form">
                            @csrf
                            <select class="col-md-8" name="hameau" title="Régions" style=
                            "
                                display: block;
                                width: 100%; height: 50px;
                                /*padding: 30px 30px;*/
                                font-size: 14px;
                                line-height: 1.42857143;
                                color: #222;
                                background-color: transparent;
                                background-image: none;
                                border: none;
                                border-bottom: 3px solid #222;
                                border-radius: 0;
                                box-shadow: none;
                            ">
                                <option value="0" class="form-control col-md-8"><b>Choose your hamlet</b></option>
                                @foreach($hameau as $h)
                                    <option value="{{$h->id}}"> {{$h->pay." / ".$h->etat." / ".$h->departement." / ".$h->commune." / ".$h->arrondissement." / ".$h->village." / ".$h->nom}} </option>
                                @endforeach
                            </select>
                            <select class="col-md-8" name="batie" title="Batie" style=
                            "
                                display: block;
                                width: 100%; height: 50px;
                                /*padding: 30px 30px;*/
                                font-size: 14px;
                                line-height: 1.42857143;
                                color: #222;
                                background-color: transparent;
                                background-image: none;
                                border: none;
                                border-bottom: 3px solid #222;
                                border-radius: 0;
                                box-shadow: none;
                            ">
                                <option value="0" class="form-control col-md-8"><b>Est batie</b></option>
                                <option value="1" class="form-control col-md-8"><b>N'est pas batie</b></option>

                            </select>
                            <input type="number" class="form-control col-md-8" name="land" placeholder="N° of Land *" id="land" required data-validation-required-message="Please enter the number of land." value="{{$numTerrain}}"/>
                            <input type="number" class="form-control col-md-6" name="state" placeholder="N° of State" id="state" value="{{$numEtat}}" />
                            <input type="number" class="form-control col-md-6" name="lot" placeholder="N° Lot" id="lot" value="{{$lot}}" />
                            <input type="number" class="form-control col-md-6" name="area" placeholder="Surface" id="area" value="{{$superficie}}" required data-validation-required-message="Please enter the area of your land."/>
                            <input type="file" class="form-control col-md-6 filestyle margin images" name="temoin" placeholder="Sample photo *" id="temoin" data-input="false" data-buttonText="Upload Logo" data-size="sm" data-badge="false" required data-validation-required-message="Please choose the sample picture." value="{{ url('/storage/'.$photo) }}"/>
                            {{--<input type="date" class="form-control col-md-4" name="datedebutprevu" placeholder="Planned Start *" id="date" required data-validation-required-message="Please enter the planned start." />--}}
                            {{--<input type="date" class="form-control col-md-4" name="datefinprevu" placeholder="Planned End *" id="date" required data-validation-required-message="Please enter the planned end." />--}}
                            <input type="number" name="projet" placeholder="Projet *" id="date" value="{{$projetId}}" hidden="hidden"/>
                            <input type="number" name="proprietaire" placeholder="Projet *" id="date" value="{{$proprietaire->id}}" hidden="hidden"/>
                            {{--<input type="richtext" class="form-control col-md-12" name="obs" placeholder="Observation *" id="obs" required data-validation-required-message="Please enter the description of your projet." />--}}
                            <adelia:entryfield type="ALPHA" length="8000">
                                <textarea name="obs" id="Description" class="form-control col-md-6" placeholder="Observation *" required data-validation-required-message="Please enter the description of your projet.">
                                    {{$obs}}
                                </textarea>
                            </adelia:entryfield>
                            @if($projetId != "")
                                <adelia:entryfield type="ALPHA" length="8000">
                                    <textarea name="details" id="Description" class="form-control col-md-6" placeholder="Observation *" required data-validation-required-message="Please enter the description of your projet.">
                                        Details précises sur le projet *
                                    </textarea>
                                </adelia:entryfield>
                            @endif
                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Next" />
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <script>

        </script>
    </section>
@endsection