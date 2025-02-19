<!-- Footer Section -->
<footer class="theme-footer-one">
    <div class="top-footer" style="background: linear-gradient(to right, #f1f2b5, #135058); padding: 40px 0;">
        <div class="container">
            <div class="row">
                <!-- About the Conference Section -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 about-widget">
                    <h4 class="title">ABOUT THE CONFERENCE</h4>
                    <p><strong>Title:</strong> ICAFW 2024</p>
                    <p><strong>Theme:</strong>Bridging AI Horizons for Future of Work</p>
                    <p><strong>Date:</strong> 7<sup>th</sup> December 2024</p>
                    <p><strong>Location:</strong> Four Points By Sheraton, Dar es Salaam, Tanzania</p>
                    <p><a href="{{ route('about') }}" style="color: white;">READ MORE...</a></p>
                </div>

                <!-- Recent Posts Section -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-recent-post">
                    <h4 class="title">RECENT POSTS</h4>
                    <ul>
                        @php
                            $events = \App\Models\Event::latest()->take(2)->get();
                        @endphp
                        @foreach ($events as $event)
                            <p class="clearfix">
                                <img src="{{ asset($event->image != null ? 'storage/' . $event->image : 'assets/images/ico/event_default.png') }}"
                                    alt="" class="float-left" style="width: 60px; height: 60px;">
                            <div class="post float-left">
                                <div class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    {{ $event->created_at->format('M d, Y') }}
                                </div>
                            </div>
                            </p>
                        @endforeach
                    </ul>
                </div>

                <!-- Contacts Section -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-contact">
                    <h4 class="title">CONTACTS</h4>
                    <ul class="contact-info">
                        <li><i class="flaticon-email"></i> Email: <a
                                href="mailto:conference@arifa.org"style="color: #fff;">conference@arifa.org</a></li>
                        <li>Phone: +255742372702</li>
                        <li>Address: YMCA Building, Upanga Road</li>
                        <li>Box: 2512, Dar es Salaam, Tanzania</li>
                    </ul>
                </div>

                <!-- Useful Links Section -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-list">
                    <h4 class="title">USEFUL LINKS</h4>
                    <ul>
                        <li><a href="{{ route('about') }}" style="color: #fff;">About</a></li>
                        <li><a href="https://arifa.org" style="color: #fff;">ARIFA</a></li>
                        <li><a href="https://ijait.arifa.org" style="color: #fff;">IJAIT</a></li>
                        <li><a href="care4life.or.tz" style="color: #fff;">Care4Life</a></li>
                        {{-- <li><a href=""></a></li> --}}
                    </ul>
                </div>



                <!-- Newsletter Section -->
                <!-- Newsletter Section -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-newsletter">
                    <h4 class="title">NEWSLETTER</h4>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Full Name *" class="form-control mb-2"
                            required>
                        <input type="email" name="email" placeholder="Email *" class="form-control mb-2" required>

                        <div class="subscribe-button mt-4">
                            <button type="submit" class="btn btn-primary"
                                style="background-color: rgb(255, 90, 90); color: white; padding: 10px 20px; border-radius: 5px;">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>





            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="bottom-footer" style="background-color: rgb(8, 0, 0); padding: 10px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <button class="scroll-top tran3s"
                        style="background-color: rgba(255, 255, 255, 0.2); color: rgb(255, 90, 90); border: 2px solid white; position: fixed; right: 4px; bottom: 20px; z-index: 1000;"
                        onclick="scrollToBody()">
                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                    </button>


                    <p style="color: white; font-size: 14px; text-align: center;">
                        &copy; 2018 -
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Africa Research Institute for AI (ARIFA). All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script>
    function scrollToBody() {
        document.getElementById('body').scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>
