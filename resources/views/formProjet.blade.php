
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
                        <h2 class="section-heading">Submit Project</h2>
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
                        <form method="post" action="{{ route('addProjet') }}">
                            @csrf
                            <input type="text" class="form-control col-md-6" value="{{$nom}}" name="nom" placeholder="Name of project *" id="name" required data-validation-required-message="Please enter the name of project." />
                            <input type="date" class="form-control col-md-4" value="{{$datedebutprevu}}" name="datedebutprevu" placeholder="Planned Start *" id="date" required data-validation-required-message="Please enter the planned start." />
                            <input type="date" class="form-control col-md-4" value="{{$datefinprevu}}" name="datefinprevu" placeholder="Planned End *" id="date" required data-validation-required-message="Please enter the planned end." />
                            <input type="number" class="form-control col-md-6" value="{{$budgetPrevu}}" name="budgetPrevu" placeholder="Planned Budget *" id="date" required data-validation-required-message="Please enter the planned end." />
                            <adelia:entryfield type="ALPHA" length="8000">
                                <textarea name="description" id="Description" class="form-control col-md-6" placeholder="Description *" required data-validation-required-message="Please enter the description of your projet.">
                                    {{$description}}
                                </textarea>
                            </adelia:entryfield>
                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Next" />
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection




