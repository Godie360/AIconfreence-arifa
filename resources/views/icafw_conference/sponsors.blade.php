@extends('icafw_conference.master')
@section('conference')
    <div class="gb-breadcrumb gb-bg white-color" style="position: relative; height: 400px;">
        <!-- Background Image with Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset('assets/images/bg/cb9.png') }}') no-repeat center center/cover; opacity: 1;">
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
                        <span>Sponsors</span>
                        <span class="before-bottom"></span>
                    </h1>
                </div>
                <!-- Breadcrumb Navigation -->
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: #fff; font-size: 1.2rem;">Home</a></li>
                    <li class="active" style="color: #ddd; font-size: 1.2rem;">Sponsors</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="gb-sponsors gb-section">
        <div class="container">
            <h1 style="color: blue; text-align: center;">Become a Sponsor</h1>

            <div class="row">
                <div class="col-md-6">
                    <h2 class="card-title">Sponsorship Packages & Pricing</h2>
                    <div class="custom-card">

                        @if ($SponsorshipPackages)
                            <ul class="list-unstyled">
                                @foreach ($SponsorshipPackages as $package)
                                    <li>
                                        <h4><strong>{{ $package->name }}:</strong> ${{ number_format($package->price, 2) }}
                                        </h4>
                                        <p><em>{{ $package->description }}</em></p>
                                        <ul>
                                            @foreach ($package->benefits as $benefit)
                                                <li>{{ $benefit }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif


                        <div class="custom-card">
                            <!-- Bank details section -->
                            <h3 class="mt-4">Bank Details for Payment:</h3>
                            <h5 style="color: blue;">Every Payment Should be done under this Account</h5>
                            <ul class="list-unstyled">
                                <li><strong>Account Name:</strong> AFRICA RESEARCH INSTITUTE FOR AI</li>
                                <li><strong>Account No.:</strong> 015C715390200</li>
                                <li><strong>Bank Name:</strong> CRDB BANK PLC</li>
                                <li><strong>Branch Name:</strong> MBEZI BEACH</li>
                                <li><strong>Branch Code:</strong> CORUTZTZ</li>
                                <li><strong>SWIFT/IBAN:</strong> CORUTZTZ</li>
                                <li><strong>Contact:</strong> +255 742 372 702</li>
                                <li><strong>Email:</strong> conference@arifa.org</li>
                                {{-- <li>already registered? create an invoice now</li> --}}
                                <button type="button" class="btn btn-secondary" onclick="openModal()">Verify
                                    Payment</button>

                            </ul>
                        </div>
                    </div>
                </div>

<div class="col-md-6">
    <h2 class="card-title">Registration Form</h2>
    <form id="sponsorForm" class="custom-form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" id="company_name" name="company_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" id="contact_person" name="contact_person" class="form-control" required>
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
            <label for="sponsorship_level">Sponsorship Level</label>
            <select id="sponsorship_level" name="sponsorship_level" class="form-control" required>
                @foreach ($SponsorshipPackages as $package)
                    <option value="{{ $package->name }}">
                        {{ $package->name }} - ${{ number_format($package->price, 0) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="logo">Company Logo</label>
            <input type="file" id="logo" name="logo" class="form-control" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="link">Website Link</label>
            <input type="url" id="link" name="link" class="form-control">
        </div>
        <div class="form-group">
            <label for="package_type">Package Type</label>
            <select id="package_type" name="package_type" class="form-control" required>
                <option value="Gold">Gold</option>
                <option value="Silver">Silver</option>
                <option value="Bronze">Bronze</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="0">Pending</option>
                <option value="1">Approved</option>
            </select>
        </div>
        <div class="form-group">
            <label for="invoice_number">Invoice Number</label>
            <input type="number" id="invoice_number" name="invoice_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register as Sponsor</button>
    </form>
</div>

            </div>
        </div>
    </div>


    @include('icafw_conference.invoice_model')


    <style>
        .gb-sponsors {
            padding: 40px 15px;
            background-color: #f8f9fa;
        }

        .custom-card {
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
            color: #d9534f;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>


<script>
$(document).ready(function () {
    $("#sponsorForm").submit(function (e) {
        e.preventDefault(); // Prevent normal form submission

        var form = $(this);
        var formData = new FormData(this); // Use FormData for file upload
        formData.append('_token', "{{ csrf_token() }}"); // Add CSRF token manually

        $.ajax({
            url: "{{ route('sponsor_register') }}", // Move route here
            type: "POST",
            data: formData,
            contentType: false,  // Required for file upload
            processData: false,  // Required for file upload
            beforeSend: function () {
                form.find("button[type='submit']").prop("disabled", true).text("Processing...");
            },
            success: function (response) {
                if (response.status === "success") {
                    alert(response.message); // Show success message

                    setTimeout(function () {
                        form[0].reset(); // Reset the form
                        location.reload(); // Refresh the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    alert("Unexpected response: " + response.message);
                }
            },
            error: function (xhr) {
                var response = xhr.responseJSON;

                if (xhr.status === 422) {
                    let errors = Object.values(response.errors).flat().join("\n");
                    alert("Validation Errors:\n" + errors);
                } else {
                    alert("Error: " + response.message + "\n" + (response.error_detail || ""));
                }
            },
            complete: function () {
                form.find("button[type='submit']").prop("disabled", false).text("Register as Sponsor");
            }
        });
    });
});
</script>


    {{-- validation --}}
    <script>
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
    </script>
    {{-- validation kwisha --}}


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if verifyPayments is not empty

            @if (isset($invoice_number))
                $("#filter_value").val({{ $invoice_number }});

                @if (!empty($verifyPayments) && !isset($verifyPayments['error']))
                    // Populate modal fields with verifyPayments data
                    $("#amount_due").text('Amount Due: {{ $verifyPayments['amount'] }}');
                    $("#amount_left").text('Amount Left: {{ $verifyPayments['amount_left'] }}');
                    // If amount left is less than or equal to 0
                    if ({{ $verifyPayments['amount_left'] }} <= 0) {
                        // Show success message
                        $(".error_message").removeClass("hidden").css("color", "green").text(
                            `Success! Invoice located for {{ $verifyPayments['user_email'] }}. This invoice has already been fully paid.`
                        );

                        // Disable input fields and button
                        $('#account_number').prop("disabled", true);
                        $('#amount_paid').prop("disabled", true);
                        $('#transaction_id').prop("disabled", true);
                        $('#verify-btn').prop("disabled", true);

                        // Set amount left to 0
                        $("#amount_left").text('Amount Left: ' + 0);
                    } else {
                        // Show invoice found message
                        $(".error_message").removeClass("hidden").css("color", "green").text(
                            `Invoice Found: {{ $verifyPayments['user_email'] }} for {{ $verifyPayments['invoice_type'] }} Registration`
                        );
                    }

                    // Open the modal since a valid invoice is found
                    openModal(); // Call your function to open the modal
                @else
                    // Handle the case where the invoice is not found
                    $(".error_message").removeClass("hidden").css("color", "red").text(
                        "Invoice not found. Please check the invoice number.");
                    $("#filter_value").css("border-color", "red"); // Optionally highlight the input field
                    openModal(); // Call your function to open the modal
                @endif
            @endif
        });
    </script>




    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
