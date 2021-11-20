
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
                        <h2 class="section-heading">Add coordinate</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="welcome">
        <style>

            #omap{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                margin: 0px;
                padding: 0px;
                margin-top: 30px;
                height:400px;
                width: 100%;
            }
        </style>
        <div class="section-inner nopaddingbottom">

            <div class="container">
                <div class="row">
                    <div id="omap">
                        <!-- Ici s'affichera la carte -->
                    </div>

                    <div class="col-md-3">
                        {{--<p class="lead">Sold old ten are quit lose deal his sent. You correct how sex several far distant believe journey parties. We shyness enquire uncivil affixed it carried to. </p>--}}
                        {{--<p>End sitting shewing who saw besides son musical adapted. Contrasted interested eat alteration pianoforte sympathize was. He families believed if no elegance interest surprise an. It abode wrong miles an so delay plate.</p>--}}
                    </div>

                    <div class="col-md-6" style="border: 0px;">
                        <div id="message"></div>
                        <form method="post" action="{{ route('addCoordonnee') }}">
                            @csrf
                            <input type="text" class="form-control col-md-6" name="longitude" placeholder="Longitude *" id="lati" required data-validation-required-message="Please enter the name of partner." />
                            <input type="text" class="form-control col-md-6" name="latitude" placeholder="Latitude *" id="longi" required data-validation-required-message="Please enter the role of partner." />
                            <input type="number" value="{{$terrain}}" name="terrain" placeholder="Planned Budget *" id="date" hidden="hidden" />
                            <input type="number" value="1" name="typeSub" placeholder="Projet *" id="typeSub" hidden="hidden"/>
                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="add another coordinate" style="margin-left: 50px;"/>

                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="add and next" onclick="changeSub();"/>
                            {{--<input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Next" />--}}
                        </form>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>Longitude</td>
                            <td>Latitude</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach( $coordonnee as $coordonne)
                                <tr>
                                    <td>{{ $coordonne->longitude }}</td>
                                    <td>{{ $coordonne->latitude }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection