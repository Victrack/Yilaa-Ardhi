
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

    <section id="welcome">
        <div class="section-inner nopaddingbottom">

            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        {{--<p class="lead">Sold old ten are quit lose deal his sent. You correct how sex several far distant believe journey parties. We shyness enquire uncivil affixed it carried to. </p>--}}
                        {{--<p>End sitting shewing who saw besides son musical adapted. Contrasted interested eat alteration pianoforte sympathize was. He families believed if no elegance interest surprise an. It abode wrong miles an so delay plate.</p>--}}
                    </div>

                    <div class="col-md-6">
                        <div id="message"></div>
                        <form method="post" action="{{ route('addOwner') }}" enctype="multipart/form-data" role="form">
                            @csrf
                            <input type="text" class="form-control col-md-8" value="{{$nom}}" name="nom" placeholder="Last Name *" id="nom" required data-validation-required-message="Please enter your lastname."/>
                            <input type="text" class="form-control col-md-8" value="{{$prenom}}" name="prenom" placeholder="First Name *" id="prenom" required data-validation-required-message="Please enter your firstname."/>
                            <input type="number" class="form-control col-md-6" value="{{$tel}}" name="tel" placeholder="Phone Number" id="tel" value="" required data-validation-required-message="Please enter your phone number."/>
                            <input type="email" class="form-control col-md-6" value="{{$email}}" name="email" placeholder="Email" id="email" value="" required data-validation-required-message="Please enter your email."/>
                            <input type="date" class="form-control col-md-6" value="{{$dateNai}}" name="dateNai" placeholder="Date of Birth" id="date" value="" required data-validation-required-message="Please enter your date of birth."/>
                            <input type="text" class="form-control col-md-8" value="{{$lieuNai}}" name="lieuNai" placeholder="Place of Birth *" id="lieuNai" value="" required data-validation-required-message="Please enter your place of birth." />
                            <input type="file" class="form-control col-md-6" value="{{$photo}}" name="temoin" placeholder="Picture *" id="describe" required data-validation-required-message="Please choose the picture." />
                            <input type="number" value="{{$projet}}" name="projet" placeholder="Projet *" id="date" value="" hidden="hidden"/>
                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Next" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection