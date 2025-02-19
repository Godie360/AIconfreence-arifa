@extends('icafw_conference.master')
@section('conference')
    <div class="gb-breadcrumb gb-bg white-color" style="position: relative; height: 400px;">
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset('assets/images/bg/cb5.png') }}') no-repeat center center/cover; opacity: 1;">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
            </div>
        </div>
        <div class="container d-flex justify-content-center align-items-center"
            style="height: 100%; position: relative; z-index: 1;">
            <div class="breadcrumb-info text-center">
                <div class="page-title title-white">
                    <h1 style="color: #fff; margin-bottom: 20px;">
                        <span class="before-top"></span>
                        <span>Registration</span>
                        <span class="before-bottom"></span>
                    </h1>
                </div>
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: #fff; font-size: 1.2rem;">Home</a></li>
                    <li class="active" style="color: #ddd; font-size: 1.2rem;">Register</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="gb-ticket gb-section">
        <div class="container">
            <h1 style="color: blue; text-align: center;">Ticket Pricing</h1>

            <div class="row">


                <div class="col-md-6">
                    <h2 class="card-title">Ticket Packages & Pricing</h2>
                    <div class="custom-card">
                        <div class="currency_option" id="currencyOption">
                            <button class="currency-btn active" id="usd">USD</button>
                            <button class="currency-btn" id="tsh">TZS</button>
                        </div>

                        <div class="pricing-container">
                            <div class="usd" id="usd_model">
                                <ul class="list-unstyled">
                                    <li>
                                        <h4><strong>Foreigners:</strong> $200</h4>
                                    </li>
                                    <li>
                                        <h4><strong>EAC:</strong> $120</h4>
                                    </li>
                                    <li>
                                        <h4><strong>Locals:</strong> $75</h4>
                                    </li>
                                    <li>
                                        <h4><strong>Students:</strong> $60</h4>
                                    </li>
                                </ul>
                                <h5>Do you want to be <a
                                        href="{{ route('speaker.register') }}"><strong>Speaker?</strong></a></h5>
                            </div>

                            <div class="tsh hidden" id="tsh_model">
                                <ul class="list-unstyled">
                                    <li>
                                        <h4><strong>Foreigners:</strong> 550,000/= Tsh</h4>
                                    </li>
                                    <li>
                                        <h4><strong>EAC:</strong> 330,000/= Tsh</h4>
                                    </li>
                                    <li>
                                        <h4><strong>Locals:</strong> 200,000/= Tsh</h4>
                                    </li>
                                    <li>
                                        <h4><strong>Students:</strong> 160,000/= Tsh</h4>
                                    </li>
                                </ul>
                                <h5>Do you want to be <a
                                        href="{{ route('speaker.register') }}"><strong>Speaker?</strong></a></h5>
                            </div>



                            {{-- <div class="custom-card">
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
                                    <button type="button" class="btn btn-secondary" onclick="openModal()">Verify
                                        Payment</button>

                                </ul>
                            </div> --}}


                        </div>
                    </div>
                </div>



                <div class="col-md-6">
                    <h2 class="card-title">Registration Form</h2>
                    <form action="{{ route('participants_registration.submit') }}" method="POST" class="custom-form"
                        enctype="multipart/form-data" id="participantsForm">
                        @csrf

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="organization">Organization</label>
                            <input type="text" id="organization" name="organization" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="job_title">Job Title</label>
                            <input type="text" id="job_title" name="job_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="package_type">Package</label>
                            <select id="package_type" name="package_type" class="form-control" required>
                                <option value="">--choose package--</option>
                                <option value="foreigner">Foreigner</option>
                                <option value="locals">Tanzanian</option>
                                <option value="eac">EAC</option>
                                <option value="students">Student</option>
                            </select>
                        </div>

                        <div id="additionalFields">
                            <div id="foreignerFields" style="display:none;">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" id="country" name="country" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="passport">Passport</label>
                                    <input type="file" id="passport" name="passport" class="form-control" required>
                                </div>
                            </div>



                            <div id="localsFields" style="display:none;">
                                <div class="form-group">
                                    <label for="nida">NIDA Number</label>
                                    <input type="number" id="nida" name="nida" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nida_image">Upload NIDA Image</label>
                                    <input type="file" id="nida_image" name="nida_image" class="form-control"
                                        required>
                                </div>
                            </div>




                            <div id="eacFields" style="display:none;">
                                <div class="form-group">
                                    <label for="eac_country">Country</label>
                                    <input type="text" id="eac_country" name="eac_country" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="nic_nida">NIC/NIDA Number</label>
                                    <input type="number" id="nic_nida" name="nic_nida" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nicImage">Upload NIC/NIDA Image</label>
                                    <input type="file" id="nicImage" name="nicImage" class="form-control" required>
                                </div>
                            </div>

                            <div id="studentsFields" style="display:none;">
                                <div class="form-group">
                                    <label for="school_name">School Name</label>
                                    <input type="text" id="school_name" name="school_name" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="registration_number">Registration Number (as seen on ID)</label>
                                    <input type="text" id="registration_number" name="registration_number"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="studentId">Upload Student ID</label>
                                    <input type="file" id="studentId" name="studentId" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit_registrtion" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @include('icafw_conference.invoice_model')




    <style>
        .gb-ticket {
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
            margin-bottom: 20px;
        }

        .currency-btn {
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
        }

        .currency-btn.active {
            background-color: #007bff;
            color: #fff;
        }

        .currency-btn:not(.active) {
            background-color: #e9ecef;
            color: #000;
        }

        .hidden {
            display: none;
        }



        /* booth model */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>


    {{-- @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                let status = "{{ session('status') }}";
                let message = "{{ session('message') }}";

                if (status === 'success') {
                    swal("Congratulations!", message, "success");
                } else if (status === 'error') {
                    swal("Oops!", message, "warning");
                }
            });
        </script>
    @endif --}}





    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const packageSelect = document.getElementById('package_type');
            const foreignerFields = document.getElementById('foreignerFields');
            const localsFields = document.getElementById('localsFields');
            const eacFields = document.getElementById('eacFields');
            const studentsFields = document.getElementById('studentsFields');

            // Function to hide all fields and remove 'required' attributes
            function hideAllFields() {
                foreignerFields.style.display = 'none';
                localsFields.style.display = 'none';
                eacFields.style.display = 'none';
                studentsFields.style.display = 'none';

                // Remove 'required' attribute when fields are hidden
                removeRequired(foreignerFields);
                removeRequired(localsFields);
                removeRequired(eacFields);
                removeRequired(studentsFields);
            }

            // Function to show fields and add 'required' attributes
            function showFields(fields) {
                fields.style.display = 'block';
                addRequired(fields);
            }

            // Remove 'required' attribute for all inputs within a section
            function removeRequired(fields) {
                const inputs = fields.querySelectorAll('input, select');
                inputs.forEach(input => {
                    input.removeAttribute('required');
                });
            }

            // Add 'required' attribute for all inputs within a section
            function addRequired(fields) {
                const inputs = fields.querySelectorAll('input, select');
                inputs.forEach(input => {
                    input.setAttribute('required', 'required');
                });
            }

            // Add event listener for package selection
            packageSelect.addEventListener('change', function() {
                hideAllFields(); // First hide all fields and remove required attributes

                // Show the appropriate fields and add required attributes
                switch (this.value) {
                    case 'foreigner':
                        showFields(foreignerFields);
                        break;
                    case 'locals':
                        showFields(localsFields);
                        break;
                    case 'eac':
                        showFields(eacFields);
                        break;
                    case 'students':
                        showFields(studentsFields);
                        break;
                }
            });





            // Currency selection
            const usdBtn = document.getElementById('usd');
            const tshBtn = document.getElementById('tsh');
            const usdModel = document.getElementById('usd_model');
            const tshModel = document.getElementById('tsh_model');

            usdBtn.addEventListener('click', function() {
                usdModel.classList.remove('hidden');
                tshModel.classList.add('hidden');
                usdBtn.classList.add('active');
                tshBtn.classList.remove('active');
            });

            tshBtn.addEventListener('click', function() {
                usdModel.classList.add('hidden');
                tshModel.classList.remove('hidden');
                usdBtn.classList.remove('active');
                tshBtn.classList.add('active');
            });

        });
    </script>


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

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
