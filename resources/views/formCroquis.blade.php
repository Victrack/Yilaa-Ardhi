
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
                        <h2 class="section-heading">Add Owner</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section i="welcome">
        <div cldass="section-inner nopaddingbottom">

            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        {{--<p class="lead">Sold old ten are quit lose deal his sent. You correct how sex several far distant believe journey parties. We shyness enquire uncivil affixed it carried to. </p>--}}
                        {{--<p>End sitting shewing who saw besides son musical adapted. Contrasted interested eat alteration pianoforte sympathize was. He families believed if no elegance interest surprise an. It abode wrong miles an so delay plate.</p>--}}
                    </div>

                    <div class="col-md-6">
                        <div id="message"></div>
                        <form method="post" action="{{ route('addCroquis') }}" enctype="multipart/form-data" role="form">
                            @csrf
                            <input type="text" class="form-control col-md-8" value="" name="nom" placeholder="Last Name *" id="nom" required data-validation-required-message="Please enter the name of picture."/>
                            <input type="file" class="form-control col-md-6 filestyle margin images" data-input="false" data-buttonText="Upload Logo" data-size="sm" data-badge="false" value="" name="photo" placeholder="Picture *" id="photo" required data-validation-required-message="Please choose the picture." />
                            <input type="number" value="{{$terrain}}" name="terrain" placeholder="Projet *" id="date" hidden="hidden"/>
                            <input type="number" value="1" name="typeSub" placeholder="Projet *" id="typeSub" hidden="hidden"/>
                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="add another sketch" style="margin-left: 50px;"/>
                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="add and next" onclick="changeSub();"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection