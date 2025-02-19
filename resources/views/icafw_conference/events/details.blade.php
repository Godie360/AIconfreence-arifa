@extends('frontend.layout.app')

@section('main-content')
<!--
			=============================================
				Theme Inner Banner
			==============================================
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Event Details</h2>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!--
			=============================================
				Service Details
			==============================================
			-->
			<div class="service-details section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8 col-12">
							<div class="service-content">
								<img src="{{ asset('images/project_placeholder.png') }}" alt="" class="cover-img">
								<h3 class="main-title">{{ $event->topic }}</h3>
								<p>{!! $event->description !!}</p>

								{{-- <div class="presentation-section">
									<h4 class="sub-heading">Company Presentation:</h4>
									<p>That this group would somehow form a family that's the way we all became the Brady Bunch apartment in the sky moving on up to the east side a family to explore strange new worlds.</p>
									<div class="row">
										<div class="col-md-6 col-12">
											<ul class="best-list-item">
												<li>
													<i class="icon flaticon-interface"></i>
													<h5>Technology</h5>
													<p>The Love Boat soon will be making another run plore strange.</p>
												</li>
												<li>
													<i class="icon flaticon-technology"></i>
													<h5>Innovation</h5>
													<p>The Love Boat soon will be making another run plore strange.</p>
												</li>
												<li>
													<i class="icon flaticon-chart"></i>
													<h5>Integration</h5>
													<p>The Love Boat soon will be making another run plore strange.</p>
												</li>
											</ul>
										</div>
										<div class="col-md-6 col-12"><img src="images/home/pattern3.png" alt="" class="chart"></div>
									</div>
								</div> <!-- /.presentation-section --> --}}

								{{-- <div class="topics">
									<h4 class="sub-heading">Usefull Topics:</h4>
									<div class="accordion-one">
										<div class="panel-group theme-accordion" id="accordion">
										  <div class="panel">
										    <div class="panel-heading">
										      <h6 class="panel-title">
										        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
										        1. What industries do you specialize in?</a>
										      </h6>
										    </div>
										    <div id="collapse1" class="panel-collapse collapse">
										      <div class="panel-body">
										      	<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the govern ment they survive as soldiers of fortune to a deluxe you apartment that this group would somehow form a apartment in the sky moving on up to the east side a family to explore strange new worlds.</p>
										      </div>
										    </div>
										  </div> <!-- /panel 1 -->
										  <div class="panel">
										    <div class="panel-heading active-panel">
										      <h6 class="panel-title">
										        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
										        2. You guarantee that our plan will raise capital?</a>
										      </h6>
										    </div>
										    <div id="collapse2" class="panel-collapse collapse show">
										      <div class="panel-body">
										      	<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the govern ment they survive as soldiers of fortune to a deluxe you apartment that this group would somehow form a apartment in the sky moving on up to the east side a family to explore strange new worlds.</p>
										      </div>
										    </div>
										  </div> <!-- /panel 2 -->
										  <div class="panel">
										    <div class="panel-heading">
										      <h6 class="panel-title">
										        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
										        3. Do you ever invest in your clients?</a>
										      </h6>
										    </div>
										    <div id="collapse3" class="panel-collapse collapse">
										      <div class="panel-body">
										      	<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the govern ment they survive as soldiers of fortune to a deluxe you apartment that this group would somehow form a apartment in the sky moving on up to the east side a family to explore strange new worlds.</p>
										      </div>
										    </div>
										  </div> <!-- /panel 3 -->
										  <div class="panel">
										    <div class="panel-heading">
										      <h6 class="panel-title">
										        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
										       4. What makes your financial projections special?</a>
										      </h6>
										    </div>
										    <div id="collapse4" class="panel-collapse collapse">
										      <div class="panel-body">
										      	<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the govern ment they survive as soldiers of fortune to a deluxe you apartment that this group would somehow form a apartment in the sky moving on up to the east side a family to explore strange new worlds.</p>
										      </div>
										    </div>
										  </div> <!-- /panel 4 -->
										  <div class="panel">
										    <div class="panel-heading">
										      <h6 class="panel-title">
										        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
										       5. Will you agree with everything I say?</a>
										      </h6>
										    </div>
										    <div id="collapse5" class="panel-collapse collapse">
										      <div class="panel-body">
										      	<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the govern ment they survive as soldiers of fortune to a deluxe you apartment that this group would somehow form a apartment in the sky moving on up to the east side a family to explore strange new worlds.</p>
										      </div>
										    </div>
										  </div> <!-- /panel 5 -->
										</div> <!-- end #accordion -->
									</div> <!-- End of .accordion-one -->
								</div> <!-- /.topics --> --}}

								{{-- <div class="market-growth">
									<h4 class="sub-heading">Reliable Market Growth:</h4>
									<div class="wrapper">
										<div class="row">
											<div class="col-xl-6 col-md-5 col-12"><img src="images/home/21.jpg" alt=""></div>
											<div class="col-xl-6 col-md-7 col-12">
												<p>The sky moving on up to the east side a family to explore strange new worlds to seek out new life and new civilizations to boldly go where no man has gone before you would see the biggest gift.</p>
												<ul>
													<li>Launches the last of Americas deep space.</li>
													<li>Town to town and up and down the dial.</li>
													<li>Kitchen and beans don't burn on the grill of maid.</li>
													<li>The lady met this fellow and they knew it.</li>
													<li>Most of this beautiful the day.</li>
												</ul>
											</div>
										</div>
									</div> <!-- /.wrapper -->
								</div> <!-- /.market-growth --> --}}
							</div> <!-- /.service-content -->
						</div> <!-- /.col- -->

						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 theme-sidebar-one">
							{{-- <div class="sidebar-box service-categories">
								<h5 class="title">Our Solutions</h5>
								<ul>
									<li><a href="#">Travel and Aviation</a></li>
									<li class="active"><a href="#">Business Services</a></li>
									<li><a href="#">Consumer Products</a></li>
									<li><a href="#">Financial Services</a></li>
									<li><a href="#">Software Research</a></li>
									<li><a href="#">Quality Resourcing</a></li>
								</ul>
							</div> <!-- /.service-categories --> --}}
							<div class="sidebar-box sidebar-brochures">
								<h5 class="title">Resources</h5>
                                <hr>
								@if ($event->documents)
                                <ul>
                                    @foreach ($event->documents as $item)
                                        <li><a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download file. pdf</a></li>
                                    @endforeach
								</ul>
                                @else
                                    <span>No resources attached.</span>
                                @endif
							</div> <!-- /.sidebar-brochures -->
							<div class="sidebar-box sidebar-contact">
								<h5 class="title">Contact Form</h5>
								<form action="#">
									<input type="text" placeholder="Name">
									<input type="email" placeholder="Email">
									<textarea placeholder="Message"></textarea>
									<button class="theme-button-one">SUBMIT</button>
								</form>
							</div> <!-- /.sidebar-contact -->
						</div> <!-- /.theme-sidebar-one -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.service-details -->
@endsection
