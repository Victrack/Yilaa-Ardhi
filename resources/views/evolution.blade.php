@extends('layouts.app')


@section('content')
    <style>
        /*nav {*/
            /*background-color: black;*/
        /*}*/
        /*.master-wrapper{*/
        /*background-color: darkslategray;*/
        /*}*/
        .pagination{
            background-color: transparent;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e3e6f0;
            border-radius: 0.35rem;
        }

        .card > hr {
            margin-right: 0;
            margin-left: 0;
        }

        .card > .list-group {
            border-top: inherit;
            border-bottom: inherit;
        }

        .card > .list-group:first-child {
            border-top-width: 0;
            border-top-left-radius: calc(0.35rem - 1px);
            border-top-right-radius: calc(0.35rem - 1px);
        }

        .card > .list-group:last-child {
            border-bottom-width: 0;
            border-bottom-right-radius: calc(0.35rem - 1px);
            border-bottom-left-radius: calc(0.35rem - 1px);
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .card-title {
            margin-bottom: 0.75rem;
        }

        .card-subtitle {
            margin-top: -0.375rem;
            margin-bottom: 0;
        }

        .card-text:last-child {
            margin-bottom: 0;
        }

        .card-link:hover {
            text-decoration: none;
        }

        .card-link + .card-link {
            margin-left: 1.25rem;
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        .card-header:first-child {
            border-radius: calc(0.35rem - 1px) calc(0.35rem - 1px) 0 0;
        }

        .card-header + .list-group .list-group-item:first-child {
            border-top: 0;
        }

        .card-footer {
            padding: 0.75rem 1.25rem;
            background-color: #f8f9fc;
            border-top: 1px solid #e3e6f0;
        }

        .card-footer:last-child {
            border-radius: 0 0 calc(0.35rem - 1px) calc(0.35rem - 1px);
        }

        .card-header-tabs {
            margin-right: -0.625rem;
            margin-bottom: -0.75rem;
            margin-left: -0.625rem;
            border-bottom: 0;
        }

        .card-header-pills {
            margin-right: -0.625rem;
            margin-left: -0.625rem;
        }

        .card-img-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem;
        }

        .card-img,
        .card-img-top,
        .card-img-bottom {
            flex-shrink: 0;
            width: 100%;
        }

        .card-img,
        .card-img-top {
            border-top-left-radius: calc(0.35rem - 1px);
            border-top-right-radius: calc(0.35rem - 1px);
        }

        .card-img,
        .card-img-bottom {
            border-bottom-right-radius: calc(0.35rem - 1px);
            border-bottom-left-radius: calc(0.35rem - 1px);
        }

        .card-deck .card {
            margin-bottom: 0.75rem;
        }

        @media (min-width: 576px) {
            .card-deck {
                display: flex;
                flex-flow: row wrap;
                margin-right: -0.75rem;
                margin-left: -0.75rem;
            }
            .card-deck .card {
                flex: 1 0 0%;
                margin-right: 0.75rem;
                margin-bottom: 0;
                margin-left: 0.75rem;
            }
        }

        .card-group > .card {
            margin-bottom: 0.75rem;
        }

        @media (min-width: 576px) {
            .card-group {
                display: flex;
                flex-flow: row wrap;
            }
            .card-group > .card {
                flex: 1 0 0%;
                margin-bottom: 0;
            }
            .card-group > .card + .card {
                margin-left: 0;
                border-left: 0;
            }
            .card-group > .card:not(:last-child) {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
            }
            .card-group > .card:not(:last-child) .card-img-top,
            .card-group > .card:not(:last-child) .card-header {
                border-top-right-radius: 0;
            }
            .card-group > .card:not(:last-child) .card-img-bottom,
            .card-group > .card:not(:last-child) .card-footer {
                border-bottom-right-radius: 0;
            }
            .card-group > .card:not(:first-child) {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
            }
            .card-group > .card:not(:first-child) .card-img-top,
            .card-group > .card:not(:first-child) .card-header {
                border-top-left-radius: 0;
            }
            .card-group > .card:not(:first-child) .card-img-bottom,
            .card-group > .card:not(:first-child) .card-footer {
                border-bottom-left-radius: 0;
            }
        }

        .card-columns .card {
            margin-bottom: 0.75rem;
        }

        @media (min-width: 576px) {
            .card-columns {
                -moz-column-count: 3;
                column-count: 3;
                -moz-column-gap: 1.25rem;
                column-gap: 1.25rem;
                orphans: 1;
                widows: 1;
            }
            .card-columns .card {
                display: inline-block;
                width: 100%;
            }
        }

        .accordion > .card {
            overflow: hidden;
        }

        .accordion > .card:not(:last-of-type) {
            border-bottom: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .accordion > .card:not(:first-of-type) {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .accordion > .card > .card-header {
            border-radius: 0;
            margin-bottom: -1px;
        }
    </style>

    <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="{{ URL::asset('assets/img/bg/bg2.jpg') }}" data-speed="0.7">
        <div class="section-inner pad-top-200">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mt30 wow text-center">
                        <h2 class="section-heading">
                            {{ $projet->nom }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="white-bg">
        <div class="container">
            <div class="row-reverse justify-content-center" style="text-align: center;">
                <center>
                    @foreach($etapeProjets as $etapeProjet)
                        <br>
                        <br>
                        <br>
                        <div class="col-2">
                        </div>
                        <!-- Collapsable Card Example -->
                        <div class="card shadow col-8">
                            <!-- Card Header - Accordion -->
                            <a class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Du {{ $etapeProjet->dateDebut}} au {{ $etapeProjet->dateFin}} : {{ $etapeProjet->nom}}</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body">
                                    {!!  $etapeProjet->obs !!}
                                </div>
                            </div>
                            <div class=" small">Niveau d'??volution</div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $etapeProjet->pourcentage }}%" aria-valuenow="{{ $etapeProjet->pourcentage }}" aria-valuemin="0" aria-valuemax="100">{{ $etapeProjet->pourcentage }}%</div>
                            </div>
                        </div>
                        <div class="col-2">
                        </div>

                    @endforeach
                </center>
            </div>
        </div>
    </section>
@endsection