<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content>
    <title>ARIFA 🐱‍🏍 ICAFW</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('assets/images/ico/apple-touch-icon-precomposed.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('assets/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('assets/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ asset('assets/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <!-- Add the Font Awesome stylesheet link in the head section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    {{-- exhibition issues --}}





    {{-- exhibition issues end --}}



    <!-- Slick Carousel CSS -->
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    {{-- spom slick --}}

    <style>
        .gb-speakers {
            margin: 0 auto;
            width: 100%;
        }

        .speaker {
            display: flex;
            align-items: center;
        }

        .event-section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .grid-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title-section {
            text-align: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .col-md-4 {
            width: 33.3333%;
            padding: 0 15px;
        }

        .info-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .info-box h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info-box p {
            font-size: 16px;
        }


        /* specifically for contact us form */
        .gb-contact-form {
            display: flex;
            justify-content: center;
            max-width: 100%;
            margin: 0 auto;
        }

        .gb-form {
            flex-direction: row;
        }

        @media screen and (max-width: 576px) {
            .gb-form {
                flex-direction: column;
            }
        }

        /* specifically for contact us form style ends */
    </style>



    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>


<body id="body">
    @include('icafw_conference.header')

    @yield('conference')


    @include('icafw_conference.footer')

    @if (session('status'))
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
    @endif


    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
</body>

</html>
