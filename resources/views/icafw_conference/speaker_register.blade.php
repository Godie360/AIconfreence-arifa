@extends('icafw_conference.master')

@section('conference')
    <div class="gb-breadcrumb gb-bg white-color" style="position: relative; height: 400px;">
        <!-- Background Image with Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset('assets/images/bg/cb3.png') }}') no-repeat center center/cover; opacity: 1;">
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
                        <span>Speaker Registration</span>
                        <span class="before-bottom"></span>
                    </h1>
                </div>
                <!-- Breadcrumb Navigation -->
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: #fff; font-size: 1.2rem;">Home</a></li>
                    <li class="active" style="color: #ddd; font-size: 1.2rem;">Speaker Register</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="gb-ticket gb-section">
        <div class="container">
            <h1 class="text-primary text-center mb-4">Speaker Registration Form</h1>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Speaker Registration Form -->
            <form action="{{ route('store_speaker.register') }}" method="POST" class="custom-form"
                enctype="multipart/form-data" id="speakerForm">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company">Company/Organization</label>
                            <input type="text" id="company" name="company"
                                class="form-control @error('company') is-invalid @enderror" required>
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Job Title</label>
                            <input type="text" id="title" name="title"
                                class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location"
                                class="form-control @error('location') is-invalid @enderror" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input type="text" id="topic" name="topic"
                                class="form-control @error('topic') is-invalid @enderror" required>
                            @error('topic')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Upload Profile Image</label>
                            <input type="file" id="image" name="image"
                                class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="abstract">Abstract (Max 255 characters)</label>
                    <textarea id="abstract" name="abstract" class="form-control @error('abstract') is-invalid @enderror" rows="5"
                        maxlength="255" required></textarea>
                    @error('abstract')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bio">Biography (Max 255 characters)</label>
                    <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="5"
                        maxlength="255" required></textarea>
                    @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register as Speaker</button>
            </form>
        </div>
    </div>

    <style>
        .gb-ticket {
            padding: 40px 15px;
            background-color: #f8f9fa;
        }

        .custom-form {
            margin-top: 20px;
        }

        .custom-form .form-group {
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #d9534f;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>

    <script>
        document.getElementById('speakerForm').addEventListener('submit', function(event) {
            const abstract = document.getElementById('abstract').value;
            const bio = document.getElementById('bio').value;

            if (abstract.length > 255 || bio.length > 255) {
                event.preventDefault();
                alert('Abstract and Biography should be no more than 255 characters.');
            }
        });
    </script>



    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
