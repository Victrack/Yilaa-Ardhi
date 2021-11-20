
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
                        <h2 class="section-heading">Add Partner</h2>
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
                        <form method="post" action="{{ route('addPromoteur') }}">
                            @csrf
                            <input type="text" class="form-control col-md-6" name="nom" placeholder="Name of partner *" id="name" required data-validation-required-message="Please enter the name of partner." />
                            <input type="text" class="form-control col-md-6" name="role" placeholder="Role of partner *" id="name" required data-validation-required-message="Please enter the role of partner." />
                            <input type="number" value="{{$projet}}" name="projet" placeholder="Planned Budget *" id="date" hidden="hidden" />
                            <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Next" />
                        </form>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>Name of patners</td>
                            <td>Role of patners</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach( $promoteurs as $promoteur)
                                <tr>
                                    <td>{{ $promoteur->denomination }}</td>
                                    <td>{{ $promoteur->role }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection