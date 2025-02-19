@extends('icafw_conference.master')
@section('conference')
    <div class="gb-breadcrumb gb-bg white-color" style="position: relative; height: 400px;">
        <!-- Background Image with Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset('assets/images/bg/cb7.png') }}') no-repeat center center/cover; opacity: 1;">
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
                        <span>About Conference</span>
                        <span class="before-bottom"></span>
                    </h1>
                </div>
                <!-- Breadcrumb Navigation -->
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: #fff; font-size: 1.2rem;">Home</a></li>
                    <li class="active" style="color: #ddd; font-size: 1.2rem;">About</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="gb-about gb-section" style="background:linear-gradient(rgba(209, 198, 198, 0.8));">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-info">
                        <h1 style="color: blue;">ICAFW 2024 - Bridging AI Horizons for Future of Work</h1>
                        <p style="text-align: justify;">
                            International Conference on AI & Future of Work <strong>(ICAFW-2024)</strong>, is a pioneering
                            initiative that
                            harmonizes the dynamic landscape of the future of work with the cutting-edge advancements in
                            Artificial Intelligence (AI). It provides a unique platform to explore, deliberate, and
                            strategize the intersection of AI, technology, and the evolving nature of work. The event
                            aims to foster insightful discussions, showcase practical applications, and catalyze
                            collaborative efforts to shape a progressive and sustainable future.
                        </p>
                        <h2>About Hosts</h2>
                        <h2 style="color: red;">Africa Research Institute For AI (ARIFA)</h2>

                        <p style="text-align: justify;">
                            Africa Research Institute For AI <strong>(ARIFA)</strong>, is a not-for-profit think tank united
                            by a shared
                            commitment to advancing impactful research, training and advisory. ARIFA is specifically focused
                            on Sub-Saharan Africa (SSA) and seeks to foster innovation, facilitate knowledge exchange, and
                            drive evidence-based policymaking to effectively tackle the dynamic challenges posed by the
                            rapid advancements in technology. Rooted in its commitment to interdisciplinary research and
                            collaboration, ARIFA has emerged as a pivotal force within the research and development (R&D)
                            sector. As a key player in the renaissance of AI, ARIFA actively contributes to shaping the
                            future integration of AI and other emerging technologies into the fabric of modern society.
                            Since its inception, ARIFA has been dedicated to fostering a renaissance in AI, leveraging
                            computational power and abundant data to push the boundaries of real-world applications. As
                            ARIFA continues its journey, its historic background stands as a testament to its founding
                            principles, serving as a foundation for growth, impact, and a relentless pursuit of excellence
                            in the ever-evolving fields of AI and other Emerging Technologies.
                        </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Updated Image Section with Hover Effects -->
                    <div class="about-image">
                        <img src="{{ asset('assets/images/others/about.jpg') }}" alt="Image"
                            class="img-responsive img-effect">
                    </div>
                    <div class="about-image" style="margin-top: 20px;">
                        <img src="{{ asset('assets/images/others/about-2.jpg') }}" alt="Image"
                            class="img-responsive img-effect">
                    </div>
                </div>
            </div>






            <div class="container-custom">
                <!-- Custom Container for Two Columns -->
                <div class="custom-container">
                    <!-- Event Objectives Box -->
                    <div class="custom-card">
                        <h2 class="card-title">Event Objectives</h2>
                        <div class="card-body">
                            <!-- Knowledge Exchange -->
                            <p>a) Knowledge Exchange and Exploration</p>
                            <ul>
                                <li><strong>Objective:</strong> Facilitate the exchange of knowledge and ideas among experts
                                    in AI and diverse industries.</li>
                                <li><strong>Action:</strong> Engage in presentations, discussions, and workshops to enhance
                                    understanding of AI's implications on the future of work.</li>
                            </ul>

                            <!-- Innovation and Practical Applications -->
                            <p>b) Innovation and Practical Applications</p>
                            <ul>
                                <li><strong>Objective:</strong> Encourage innovation and highlight practical AI applications
                                    shaping the future work landscape.</li>
                                <li><strong>Action:</strong> Showcase case studies, technological innovations, and
                                    successful AI implementations for task automation, business performance, and cost
                                    optimization.</li>
                            </ul>

                            <!-- Networking and Collaboration -->
                            <p>c) Networking and Collaboration</p>
                            <ul>
                                <li><strong>Objective:</strong> Foster collaboration among thought leaders, decision-makers,
                                    and technology innovators.</li>
                                <li><strong>Action:</strong> Facilitate networking opportunities for participants to
                                    connect, share experiences, and form potential partnerships to drive innovation and
                                    enhance customer experiences.</li>
                            </ul>

                            <!-- Event Tour -->
                            <p>d) Event Tour</p>
                            <ul>
                                <li><strong>Objective:</strong> Provide participants with a tour to further engage and
                                    explore relevant facilities or locations.</li>
                                <li><strong>Action:</strong> Organize an insightful event tour on the final day, enhancing
                                    participants' understanding of AI applications in practical settings.</li>
                            </ul>
                        </div>
                    </div>


                    <br>

                    <!-- Expected Outcomes Box -->
                    <div class="custom-card">
                        <h2 class="card-title">Expected Outcomes</h2>
                        <div class="card-body">
                            <!-- Short-Term Outcomes -->
                            <p>a) Short-Term Outcomes</p>
                            <ul>
                                <li><strong>Outcome:</strong> Enhanced understanding of AI’s impact on the future of work.
                                </li>
                                <li><strong>Outcome:</strong> Networking and collaboration opportunities among participants.
                                </li>
                                <li><strong>Outcome:</strong> Identification of potential areas for AI integration in
                                    various sectors.</li>
                            </ul>

                            <!-- Long-Term Outcomes -->
                            <p>b) Long-Term Outcomes</p>
                            <ul>
                                <li><strong>Outcome:</strong> Encouraged development and adoption of AI technologies in
                                    workplaces and industries.</li>
                                <li><strong>Outcome:</strong> Establishment of long-lasting partnerships and collaborations
                                    among stakeholders.</li>
                                <li><strong>Outcome:</strong> Contribution to shaping policies and strategies for
                                    responsible AI integration.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>








        </div>
    </div>

    <style>
        /* Custom CSS for Image Hover Effects */
        .img-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .img-effect:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .about-image {
            margin-bottom: 30px;
        }




        <style>.custom-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            /* Space between the two boxes */
            margin: 40px auto;
        }

        .custom-card {
            flex: 1;
            padding: 30px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #d9534f;
            /* Custom maroon for title */
            margin-bottom: 20px;
            text-align: center;
        }

        .card-body ul {
            padding-left: 20px;
            list-style: none;
        }

        .card-body ul li::before {
            content: "\2022";
            /* Custom bullet point */
            color: #28a745;
            /* Green bullet */
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .card-body p {
            color: #555;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .container-custom {
            max-width: 1200px;
            margin: auto;
            padding: 40px 15px;
        }
    </style>






    </style>




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
