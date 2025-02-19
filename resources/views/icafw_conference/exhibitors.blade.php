@extends('icafw_conference.master')

@section('conference')
    {{-- <!-- Bootstrap CSS for styling -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Interact.js for drag and drop -->
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        #mapCanvas {
            border: 1px solid #ccc;
            width: 950px;
            height: 600px;
            position: relative;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-bottom: 20px;
            background-image: url('{{ asset('exhibition/maps/' . $map_image) }}');
        }

        .booth,
        .label {
            position: absolute;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            color: white;
            user-select: none;
        }

        .booth:hover .label {
            display: block;
        }

        .booth {
            background-color: green;
        }

        .status-available {
            background-color: green;
        }

        .status-reserved {
            background-color: orange;
        }

        .status-occupied {
            background-color: red;
        }

        .label {
            background-color: blue;
            font-size: 14px;
        }

        .booth img {
            border-radius: 50%;
            margin-right: 5px;
            width: 20px;
            height: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        #boothSuggestions {
            position: absolute;
            z-index: 1000;
            background: white;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            margin-top: -120px;
        }

        #boothSuggestions .dropdown-item {
            padding: 10px;
            cursor: pointer;
        }

        #boothSuggestions .dropdown-item:hover {
            background-color: #f8f9fa;
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


        /* unjnj */
        .scrollable-container {
            overflow-x: auto;
            /* Enable horizontal scrolling */
            white-space: nowrap;
            /* Prevent items from wrapping to the next line */
            width: 100%;
            /* Make the container full width */
            /* border: 1px solid #ccc; */
            /* Optional: for visual clarity */
            padding: 10px;
            /* Optional: for spacing */

        }

        .content-item {
            display: inline-block;
            /* Allow items to be displayed in a row */
            margin-right: 10px;
            /* Space between items */
            padding: 10px;
            /* Optional: for visual comfort */
            /* background-color: #f0f0f0; */
            /* Optional: background color */
            border-radius: 5px;
            /* Optional: rounded corners */
        }

        .bank-detail {
            padding: 40px 15px;
            background-color: #f8f9fa;
        }

        .custom-card {
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
    </style>




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



    <div class="container">
        <h1 class="text-center">Exhibitors Registration Page</h1>
        <button type="button" class="btn btn-secondary" id="booth_map_id"> Load Booths </button>

        <div class="scrollable-container">

            <!-- Canvas where the map will be loaded -->
            <div class="content-item" id="mapCanvas"></div>

        </div>


        <div class="bank-detail bank-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
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


                    <!-- Exhibitor Registration Form -->
                    <div class="col-md-6">
                        <h2 class="card-title">Exhibitor Registration Form</h2>
                        <form action="{{ route('exhibitors_registration.submit') }}" method="POST" class="custom-form"
                            enctype="multipart/form-data" id="exhibitorsForm">
                            @csrf

                            <input type="hidden" name="map_id" value="1">
                            <input id="booth_price" type="hidden" name="booth_price">

                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" id="company_name" name="company_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" id="contact_person" name="contact_person" class="form-control"
                                    required>
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
                                <label for="booth_name">Booth Name</label>
                                <input type="text" id="booth_name" name="booth_name" class="form-control"
                                    placeholder="Select booth from the map" required autocomplete="off">
                                <div id="boothSuggestions" class="dropdown-menu" style="width:100%; display:none;">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="company_logo">Upload Company Logo</label>
                                <input type="file" id="company_logo" name="company_logo" class="form-control" required>
                            </div>


                            <button type="submit" class="btn btn-primary">Register as Exhibitor</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>






        {{-- nimeweka hii hapa makusudi sana right b4 the model --}}
        <script>
            // function openModal() {
            //     document.getElementById('invoiceModal').style.display = 'block';
            // }

            // function closeInvoiceModal() {
            //     document.getElementById('invoiceModal').style.display = 'none';
            // }

            function displayBoothDetails(booth) {
                const boothIconPath = '/assets/images/exhibition/icon/' + booth.booth_icon;
                const modalBody = document.getElementById('modal-body');
                modalBody.innerHTML = `
                    <h3>${booth.booth_name}</h3>
                    <p><strong>Price:</strong> ${booth.price}</p>
                    <p><strong>Status:</strong> ${booth.status}</p>
                    <p><strong>Description:</strong> ${booth.description}</p>
                    <input type='radio' name='selectedBooth' value='${booth.booth_name}' onchange="updateSelectedBooth('${booth.booth_name}')">
                    ${booth.booth_icon ? `<img src="${boothIconPath}" alt="Booth Image" style="max-width: 100%;">` : ''}
                `;

                // Show the booth details modal
                document.getElementById('boothDetailsModal').style.display = 'block';
            }
        </script>


        <!-- Modal for Booth Details -->
        <div id="boothDetailsModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Booth Details</h2>
                <div id="modal-body"></div>
            </div>
        </div>



        <!-- Modal for Invoice Selection -->
        @include('icafw_conference.invoice_model')




    </div>
    <br>
    <br>


    <script>
        // Close booth details modal
        function closeModal() {
            document.getElementById('boothDetailsModal').style.display = 'none';
            // alert('hapa');
        }

        // Event listener to close the modal when clicking the close button
        document.querySelector('#boothDetailsModal .close').addEventListener('click', closeModal);

        // Event listener to close the modal when clicking outside of it
        window.addEventListener('click', function(event) {
            const boothModal = document.getElementById('boothDetailsModal');
            if (event.target === boothModal) {
                closeModal();
            }
        });
    </script>

    <script>
        const mapCanvas = document.getElementById('mapCanvas');
        let currentAction = null;

        document.getElementById('booth_map_id').addEventListener('click', function() {
            const map_id = 1;

            if (map_id) {
                $('#mapCanvas').empty();

                $.ajax({
                    url: `/get-map-data/${map_id}`,
                    type: 'GET',
                    success: function(response) {
                        const booths = response.booths;
                        const labels = response.labels;

                        // Display booths on the map
                        booths.forEach(function(booth) {
                            const boothIconPath = '/assets/images/exhibition/icon/' + booth
                                .booth_icon;
                            const boothElement = $('<div></div>')
                                .addClass(`booth status-${booth.status}`)
                                .css({
                                    top: booth.position_y + 'px',
                                    left: booth.position_x + 'px',
                                    transform: `translate(${booth.transform_x}px, ${booth.transform_y}px)`, // Apply transform values
                                    position: 'absolute'
                                });

                            if (booth.booth_icon) {
                                boothElement.append(
                                    `<img src="${boothIconPath}" alt="Booth Icon">`);
                            }
                            boothElement.append(document.createTextNode(booth.booth_name));
                            boothElement.append(
                                `<span class="hidden-id" style="display:none;">${booth.id}</span>`
                            );

                            boothElement.on('click', function() {
                                displayBoothDetails(booth);
                            });

                            $('#mapCanvas').append(boothElement);
                        });

                        // Display labels on the map
                        labels.forEach(function(label) {
                            const labelElement = $('<div class="content-item label"></div>')
                                .css({
                                    top: label.position_y + 'px',
                                    left: label.position_x + 'px',
                                    backgroundColor: label.color,
                                    transform: `translate(${label.transform_x}px, ${label.transform_y}px)`, // Apply transform values
                                    position: 'absolute'
                                })
                                .text(label.label_name); // Corrected property name
                            $('#mapCanvas').append(labelElement);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }
        });

        function updateSelectedBooth(boothName) {
            document.querySelector('#booth_name').value = boothName;
        }

        document.getElementById('booth_name').addEventListener('input', function() {
            let query = this.value;

            if (query.length > 1) {
                fetchBoothSuggestions(query);
            } else {
                document.getElementById('boothSuggestions').style.display = 'none';
            }
        });

        function fetchBoothSuggestions(query) {
            fetch(`/search-booths?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        displaySuggestions(data);
                    } else {
                        document.getElementById('boothSuggestions').style.display = 'none';
                    }
                })
                .catch(error => console.error('Error fetching booth suggestions:', error));
        }

        function displaySuggestions(booths) {
            let suggestionBox = document.getElementById('boothSuggestions');
            suggestionBox.innerHTML = '';
            suggestionBox.style.display = 'block';

            booths.forEach(booth => {
                let suggestionItem = document.createElement('div');
                suggestionItem.classList.add('dropdown-item');
                suggestionItem.textContent = booth.booth_name;

                suggestionItem.addEventListener('click', function() {
                    document.getElementById('booth_name').value = booth.booth_name;
                    document.getElementById('booth_price').value = booth.price;
                    suggestionBox.style.display = 'none';
                });

                suggestionBox.appendChild(suggestionItem);
            });
        }
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
