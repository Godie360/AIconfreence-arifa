@extends('icafw_conference.master')
@section('conference')
    <div class="gb-breadcrumb gb-bg white-color" style="position: relative; height: 400px;">
        <!-- Background Image with Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset('assets/images/bg/cb2.png') }}') no-repeat center center/cover; opacity: 1;">
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
                        <span>Contact Us</span>
                        <span class="before-bottom"></span>
                    </h1>
                </div>
                <!-- Breadcrumb Navigation -->
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: #fff; font-size: 1.2rem;">Home</a></li>
                    <li class="active" style="color: #ddd; font-size: 1.2rem;">Contact</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="gb-contact-section gb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="card-title">Get In Touch</h2>
                    <form action="{{ route('contact_us.store') }}" method="POST" class="custom-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h2 class="card-title">Our Contact Info</h2>
                    <div class="contact-info-box custom-card">
                        <ul class="list-unstyled">
                            <li><strong>Address:</strong> YMCA Building, Upanga Road</li>
                            <li><strong>Box:</strong> 2512, Dar es Salaam, Tanzania</li>
                            <li><strong>Phone:</strong> +255 742 372 702</li>
                            <li><strong>Email:</strong> info@conference.com</li>
                            <li><strong>Working Hours:</strong> Mon - Fri: 8:00 AM - 5:00 PM</li>
                        </ul>

                        <!-- Google Maps Embed -->

                        <!-- Google Maps Section -->
                        <div id="googleMap" style="width:100%;height:450px;">
                            <h2 class="text-center font-weight-bold mb-4">Find Us Here</h2>
                            <div class="map-responsive rounded shadow">

                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.642846147435!2d39.284595376044024!3d-6.8132228666422225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4c21c49fbc45%3A0xe90ff2d5ddbe3623!2sAfrica%20Research%20Institute%20For%20AI%20-%20ARIFA!5e0!3m2!1sen!2stz!4v1728413184559!5m2!1sen!2stz"
                                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .gb-contact-section {
            padding: 40px 15px;
            background-color: #f8f9fa;
        }

        .contact-info-box {
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
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
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>

    {{-- <script>
        // Basic validation for email and phone number
        document.querySelector('.custom-form').addEventListener('submit', function(event) {
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;

            // Email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                event.preventDefault();
            }

            // Phone number validation
            if (phone.length < 10) {
                alert('Please enter a valid phone number.');
                event.preventDefault();
            }
        });

        // Google Maps API
        function initMap() {
            var mapProp = {
                center: new google.maps.LatLng(-6.792354, 39.208328),
                zoom: 15,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }

        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });
    </script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY"></script> --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
