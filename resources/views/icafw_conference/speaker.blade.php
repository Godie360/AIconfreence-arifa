@extends('icafw_conference.master')

@section('conference')
    <div class="gb-breadcrumb gb-bg white-color" style="position: relative; height: 450px;">
        <!-- Background Image with Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset('assets/images/bg/cb4.png') }}') no-repeat center center/cover; opacity: 1;">
            <!-- Overlay for better text visibility -->
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
            </div>
        </div>

        <!-- Breadcrumb Info -->
        <div class="container d-flex justify-content-center align-items-center"
            style="height: 100%; position: relative; z-index: 1;">
            <div class="breadcrumb-info text-center">
                <!-- Page Title -->
                <div class="page-title title-white">
                    <h1 style="color: #fff; margin-bottom: 20px;">
                        <span class="before-top"></span>
                        <span>Speakers</span>
                        <span class="before-bottom"></span>
                    </h1>
                </div>
                <br>

                <!-- Breadcrumb Navigation -->
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: #fff; font-size: 1.2rem;">Home</a></li>
                    <li class="active" style="color: #ddd; font-size: 1.2rem;">Speakers</li>
                </ol>
                <a href="{{ route('speaker.register') }}" class="btn btn-primary btn-lg">Call For Speaker</a>

            </div>
        </div>
    </div>


    <!-- Speaker Section -->
    <div class="container my-5">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Keynote Speakers</h2>
            <p class="section-subtitle">Explore our lineup of industry-leading speakers</p>
        </div>

        <div class="row justify-content-center">
            @foreach ($speakers as $speaker)
                <div class="col-lg-4 col-md-6 mb-5 d-flex align-items-stretch">
                    <a href="{{ url('speaker/' . Str::slug($speaker->name)) }}" class="card-link w-100">
                        <div class="card border-0 shadow-sm h-100 text-center p-4 stylish-card">
                            <div class="speaker-image mx-auto mb-3">
                                <img src="{{ asset('assets/images/speaker/' . $speaker->image) }}"
                                    alt="{{ $speaker->name }}" class="img-fluid rounded-circle">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-primary speaker-name">{{ $speaker->name }}</h5>
                                @if ($speaker->title)
                                    <p class="text-muted mb-2 speaker-title">{{ $speaker->title }}</p>
                                @endif
                                @if ($speaker->company)
                                    <p class="text-muted mb-2 speaker-company">{{ $speaker->company }}</p>
                                @endif
                                <p class="text-muted location">Location: {{ $speaker->location }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Styles -->
    <style>
        /* Section Header */
        .section-header {
            margin-bottom: 50px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #777;
        }

        /* Speaker Image */
        .speaker-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
        }

        .speaker-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .speaker-image:hover img {
            transform: scale(1.1);
        }

        /* Speaker Card */
        .stylish-card {
            background: #fff;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 30px;
            background-color: #fafafa;
            margin: 2px;
            /* Ensures no overlap */
        }

        .stylish-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
        }

        .card-body {
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .text-muted {
            font-size: 1rem;
            color: #555;
        }

        /* Truncate long speaker names */
        .speaker-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            /* Limiting the width for truncation */
        }

        .speaker-title,
        .speaker-company,
        .location {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            /* Limiting the width for truncation */
        }

        /* Breadcrumb and Page Title */
        .breadcrumb-info .page-title h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: 2px;
        }

        .breadcrumb .breadcrumb-item a {
            font-size: 1rem;
            color: #ddd;
        }

        /* Custom Button */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1.2rem;
            padding: 10px 30px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Card link styling */
        .card-link {
            text-decoration: none;
        }

        .card-link:hover .card-title,
        .card-link:hover .text-muted {
            color: #333;
        }
    </style>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
