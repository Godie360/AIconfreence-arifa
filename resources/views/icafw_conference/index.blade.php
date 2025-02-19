@extends('icafw_conference.master')
@section('conference')
    <div class="gb-banner">
        <div class="banner-info text-center">
            <div class="container">
                <h1>INTERNATIONAL CONFERENCE ON AI & FUTURE OF WORK</h1>
                <h1>(ICAFW 2024)</h1>
                <h2><span>7<sup>th</sup>, December 2024 </span>Four Points By Sheraton, Dar es Salaam, Tanzania</h2>
                <a href="register.html" class="btn">Register Now</a>
                <ul class="countdown gb-list list-inline">
                    <li>
                        <span class="days">00</span>
                        <p>days</p>
                    </li>
                    <li>
                        <span class="hours">00</span>
                        <p>hours</p>
                    </li>
                    <li>
                        <span class="minutes">00</span>
                        <p>minutes</p>
                    </li>
                    <li>
                        <span class="seconds">00</span>
                        <p>seconds</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="event-section gb-section text-center"
        style="background: linear-gradient(135deg, #001f3f, #4c89ac); padding: 50px 0;">
        <div class="container">
            <div class="title-section row mt-1 text-center">
                <h1 style="color: #fff; font-size: 2.5rem; font-weight: bold;">
                    <span class="before-top"></span>
                    <span>EXHIBITION & SPONSORSHIP PROSPECTUS</span>
                    <span class="before-bottom"></span>
                </h1>
            </div>



            <div class="row mt-4"> <!-- Adjusted margin-top for the row -->
                <!-- Column 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center " style="margin-top: 2%;">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2); max-width: 100%;">
                        <br>
                        <i class="fas fa-microphone fa-3x mb-3" style="color: #fff;"></i>
                        <h3 style="margin-bottom: 1rem; color: #fff;">Number of Speakers</h3>
                        <p id="speakers-count" style="font-size: 2.5rem; font-weight: bold; color: #fff;">0</p>
                    </div>
                </div>


                <!-- Column 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center" style="margin-top: 2%;">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.3); width: 100%;">
                        <br>
                        <i class="fas fa-building fa-3x mb-3" style="color: #fff;"></i>
                        <h3 style="margin-bottom: 1rem; color: #fff;">Number of Corporate Partners</h3>
                        <p id="partners-count" style="font-size: 2.5rem; font-weight: bold; color: #fff;">0</p>
                    </div>
                </div>

                <!-- Column 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center" style="margin-top: 2%;">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.3); width: 100%;">
                        <br>
                        <i class="fas fa-globe fa-3x mb-3" style="color: #fff;"></i>
                        <h3 style="margin-bottom: 1rem; color: #fff;">Number of International Speakers</h3>
                        <p id="international-speakers-count" style="font-size: 2.5rem; font-weight: bold; color: #fff;">0
                        </p>
                    </div>
                </div>
            </div>



        </div>
    </div>










    <div class="gb-cta-1 gb-section gb-bg">
        <div class="container">
            <div class="cta-info white-color" style="text-align: justify;">
                <h1>International Conference on AI & Future of Work (ICAFW-2024)</h1>
                <p>International Conference on AI & Future of Work (ICAFW) - is a pioneering initiative that
                    harmonizes
                    the dynamic landscape of the future of work with the cutting-edge advancements in Artificial
                    Intelligence (AI). It provides a unique platform to explore, deliberate, and strategize the
                    intersection of AI, technology, and the evolving nature of work. The event aims to foster
                    insightful
                    discussions, showcase practical applications, and catalyze collaborative efforts to shape a
                    progressive and sustainable future.</p>
                <div class="buttons">
                    <a href="{{ route('about') }}" class="btn btn-white">Explore Now</a>
                    <!-- <a href="#" class="btn">Get a Ticket</a> -->
                </div>
            </div>
        </div>
    </div>



    <section class="thematic-areas gb-section text-center" {{-- style="background-image: url{{ asset('assets/images/speaker/') }}; background-size: cover; background-position: center; padding: 50px 0;"> --}}
        style="left: 0; width: 100%; background-size: cover; height: 100%; background: url('{{ asset('assets/images/bg/ai2.jpg') }}') no-repeat center center/cover; opacity: 1;">
        <div class="container">
            <header class="title-section row mt-1 text-center">
                <h1 style="color: #fff; font-size: 2.5rem; font-weight: bold;">
                    <span class="before-top"></span>
                    <span>Thematic Areas</span>
                    <span class="before-bottom"></span>
                </h1>
            </header>
            <!-- First Row of Thematic Areas -->
            <div class="row mt-4 text-center">
                <!-- Column 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);">
                        <div class="gb-time color-red">
                            <p style="font-size: 2rem; color: #fff;">i.</p>
                        </div>
                        <div class="area-info">
                            <h3 style="color: #fff;">AI Integration in Diverse Sectors</h3>
                            <p style="color: #fff;">Explore AI applications and advancements in key sectors such as finance,
                                retail, agriculture, healthcare, education, and more.</p>
                        </div>
                    </div>
                </div>

                <br>
                <!-- Column 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);">
                        <div class="gb-time color-red">
                            <p style="font-size: 2rem; color: #fff;">ii.</p>
                        </div>
                        <div class="area-info">
                            <h3 style="color: #fff;">Data-Driven Insights and Ethics</h3>
                            <p style="color: #fff;">Delve into the role of data and ethics in AI, ensuring responsible and
                                transparent data-driven decision making.</p>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Column 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);">
                        <div class="gb-time color-red">
                            <p style="font-size: 2rem; color: #fff;">iii.</p>
                        </div>
                        <div class="area-info">
                            <h3 style="color: #fff;">Technological Innovations and Use Cases</h3>
                            <p style="color: #fff;">Showcase emerging technologies and their applications through real-world
                                use cases presented by industry pioneers.</p>
                        </div>
                    </div>
                </div>
            </div>

            <br><!-- Second Row of Thematic Areas -->


            <div class="row mt-4 text-center">
                <!-- Column 4 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);">
                        <div class="gb-time color-red">
                            <p style="font-size: 2rem; color: #fff;">iv.</p>
                        </div>
                        <div class="area-info">
                            <h3 style="color: #fff;">Policy, Regulation, and Governance</h3>
                            <p style="color: #fff;">Discuss the need for informed policies and regulations to guide the
                                responsible adoption of AI technologies.</p>
                        </div>
                    </div>
                </div>

                <br>
                <!-- Column 5 -->

                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);">
                        <div class="gb-time color-red">
                            <p style="font-size: 2rem; color: #fff;">v.</p>
                        </div>
                        <div class="area-info">
                            <h3 style="color: #fff;">Gig Economy, Diversity, and Inclusion</h3>
                        </div>
                    </div>
                </div>

                <br>
                <!-- Column 6 -->
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                    <div class="p-4 shadow-lg"
                        style="border: 2px solid #fff; background: rgba(255, 255, 255, 0.2); border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);">
                        <div class="gb-time color-red">
                            <p style="font-size: 2rem; color: #fff;">vi.</p>
                        </div>
                        <div class="area-info">
                            <h3 style="color: #fff;">Remote Work, Cybersecurity, and the Future of Work</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="event-section gb-section text-center" style="background-color: #fff; padding: 50px 0;">
        <div class="container">
            <div class="title-section">
                <h1 class="color-red">
                    <span class="before-top"></span>
                    <span>Why Attend?</span>
                    <span class="before-bottom"></span>
                </h1>
            </div>

            <p style="color: maroon;">Discover the benefits of attending the INTERNATIONAL CONFERENCE ON AI & FUTURE
                OF WORKS (ICAFW- 2024)</p>




            {{-- spom why updated --}}
            <div class="container">
                <div class="row mt-1 text-center">
                    <!-- Column 1 -->
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                        <div class="p-4 shadow-lg"
                            style="border: 2px solid #000; background: #c6f0fb; border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2); max-width: 100%;">
                            <br>
                            <i class="fas fa-users fa-3x mb-3" style="color: #E63946;"></i>
                            <h3 style="margin-bottom: 1rem;">Meet Masters in AI</h3>
                            <p style="font-size: 1.2rem; font-weight: 500;">Engage with leading experts and innovators
                                in the field of Artificial Intelligence.</p>
                        </div>
                    </div>
                    <br>
                    <!-- Column 2 -->
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                        <div class="p-4 shadow-lg"
                            style="border: 2px solid #000; background: #c6f0fb; border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2); max-width: 100%;">
                            <br>
                            <i class="fas fa-chart-line fa-3x mb-3" style="color: #E63946;"></i>
                            <h3 style="margin-bottom: 1rem;">Stay Ahead of the Curve</h3>
                            <p style="font-size: 1.2rem; font-weight: 500;">Learn about the latest trends and
                                advancements in AI to keep your skills up-to-date.</p>
                        </div>
                    </div>

                    <br>
                    <!-- Column 3 -->
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column align-items-center mb-4">
                        <div class="p-4 shadow-lg"
                            style="border: 2px solid #000; background: #c6f0fb; border-radius: 15px; box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2); max-width: 100%;">
                            <br>
                            <i class="fas fa-globe fa-3x mb-3" style="color: #E63946;"></i>
                            <h3 style="margin-bottom: 1rem;">Global Networking Opportunities</h3>
                            <p style="font-size: 1.2rem; font-weight: 500;">Connect with international speakers and
                                attendees for potential collaborations.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- why.. kwisha --}}





        </div>
    </div>


    {{-- speaker kazini --}}
    <div class="gb-speakers gb-section text-center" {{-- earlier ai1.jpg --}}
        style="width: 100%; background: url('{{ asset('assets/images/bg/cb7.png') }}') no-repeat center center/cover; opacity: 0.9;">
        <div class="container">
            @if ($guestOfHonor)
                <div class="title-section">
                    <h1 class="color-red">
                        <span class="before-top"></span>
                        <span>Guest Of Honor</span>
                        <span class="before-bottom"></span>
                    </h1>
                </div>
            @endif

            <!-- Guest of Honor Section -->
            @if ($guestOfHonor)
                <div class="row justify-content-center mb-4">
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.google.com" class="card-link">
                            <div class="card border-0 shadow-sm h-100 text-center p-4 gradient-card-bg"
                                style="border-radius: 10px;">
                                <div class="speaker-image mx-auto mb-3">
                                    <img src="{{ asset('assets/images/speaker/' . $guestOfHonor->image . '.jpg') }}"
                                        alt="{{ $guestOfHonor->name }}" class="img-fluid rounded-circle"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title text-primary"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $guestOfHonor->name }}</h4>
                                    @if ($guestOfHonor->company)
                                        <p class="text-muted mb-2">{{ $guestOfHonor->company }}</p>
                                    @endif
                                    <p class="text-muted">Location: {{ $guestOfHonor->location }}</p>
                                    <p class="text-muted">Title: <span
                                            style="color: greenyellow">{{ $guestOfHonor->title }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif

            <br>


            <div class="title-section">
                <h1 style="color: #fff">
                    <span class="before-top"></span>
                    <span>Keynote Speakers</span>
                    <span class="before-bottom"></span>
                </h1>
            </div>


            <br>
            <!-- Honored Speakers Section -->
            {{-- <img src="{{ asset('assets/images/speaker/' . $speaker->image . '.jpg') }}" --}}
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

            <!-- See More Button -->
            <div class="see-more-button mt-4" style="margin-top: 20px">
                <a href="{{ route('speaker') }}" class="btn btn-primary"
                    style="background-color: rgb(255, 90, 90); color: white; padding: 10px 20px; border-radius: 5px;">
                    See More Speakers
                </a>
            </div>
        </div>
    </div>
    {{-- speakers kwisha --}}




    {{-- sponsors --}}



    {{-- sponsor styles --}}
    <style>
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
            border-radius: 15px;
            border: 2px solid #eeeaeaaf;
            background: rgba(255, 255, 255, 0.2) transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 30px;
            background-color: rgba(9, 9, 9, 0.6);
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
            color: rgba(255, 255, 255, 0.931)
                /* Limiting the width for truncation */
        }

        .speaker-title,
        .speaker-company,
        .location {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            color: rgba(255, 255, 255, 0.931);
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
    {{-- sponsor style end --}}




    <script>
        $(document).ready(function() {
            var eventDate = new Date("Dec 7, 2024 09:00:00").getTime();

            var countdown = setInterval(function() {
                var now = new Date().getTime();
                var distance = eventDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $('.days').text(days);
                $('.hours').text(hours);
                $('.minutes').text(minutes);
                $('.seconds').text(seconds);

                if (distance < 0) {
                    clearInterval(countdown);
                    $('.days').text('00');
                    $('.hours').text('00');
                    $('.minutes').text('00');
                    $('.seconds').text('00');
                }
            }, 1000);
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to animate counting
            function animateCount(element, target) {
                $({
                    count: 0
                }).animate({
                    count: target
                }, {
                    duration: 2000, // Adjust the duration as needed
                    easing: "swing",
                    step: function() {
                        element.text(Math.ceil(this.count));
                    },
                    complete: function() {
                        element.text(target);
                    }
                });
            }

            // Check if the event section is in the viewport
            function isScrolledIntoView(elem) {
                var docViewTop = $(window).scrollTop();
                var docViewBottom = docViewTop + $(window).height();

                var elemTop = $(elem).offset().top;
                var elemBottom = elemTop + $(elem).height();

                return elemTop < docViewBottom && elemBottom > docViewTop;
            }

            // Check and animate the counts when the event section is in view
            $(window).scroll(function() {
                if (isScrolledIntoView(".event-section")) {
                    // Animate the count for Number of Speakers
                    animateCount($("#speakers-count"), 50);

                    // Animate the count for Number of Corporate Partners
                    animateCount($("#partners-count"), 30);

                    // Animate the count for Number of International Speakers
                    animateCount($("#international-speakers-count"), 20);

                    // Unbind scroll event to avoid unnecessary animations
                    $(window).off("scroll");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".col-md-4").hide().each(function(i) {
                $(this).delay(i * 100).fadeIn(1000);
            });
        });
    </script>



    {{-- spom slick --}}



    {{-- spom slick done --}}








    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
