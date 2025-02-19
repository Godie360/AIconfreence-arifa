@extends('frontend.layout.app')
<style>
    .event-card {
        display: flex;
        margin-bottom: 20px;
    }
    .event-card img {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
    .event-details {
        flex: 1;
        padding: 20px;
    }
    .event-date {
        font-size: 24px;
        font-weight: bold;
    }
    .event-date span {
        display: block;
        text-align: center;
    }
    .filter-form {
        margin-bottom: 20px;
    }
    .past-events-title {
        font-size: 32px;
        font-weight: bold;
        margin-top: 40px;
        margin-bottom: 20px;
    }
</style>
@section('main-content')
<!--
			=============================================
				Theme Inner Banner
			==============================================
			-->
			<div class="theme-inner-banner section-spacing">
				<div class="overlay">
					<div class="container">
						<h2>Events</h2>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->


			<!--
			=============================================
				Our Case
			==============================================
			-->
			<div class="our-case our-project section-spacing">
				<div class="container">
                    <div class="filter-form">
                        <form method="GET" action="{{ route('events.index') }}">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <select class="form-select" name="filter">
                                        <option value="">Filter by</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="from" class="form-control" placeholder="Start Date" value="{{ request('from') }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="to" class="form-control" placeholder="End Date" value="{{ request('to') }}">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        @foreach($events as $event)
                            <div class="col-md-12">
                                <div class="event-card">
                                    <div class="event-date" style="padding: 10px">
                                        <span style="font-size: 13px">{{ \Carbon\Carbon::parse($event->from)->format('M') }}</span>
                                        <span>{{ \Carbon\Carbon::parse($event->from)->format('d') }}</span>
                                        <span>through</span>
                                        <span style="font-size: 13px">{{ \Carbon\Carbon::parse($event->to)->format('M d') }}</span>
                                    </div>
                                    <img src="{{ asset($event->image != null ? 'storage/'.$event->image : 'images/event_default.png') }}" alt="{{ $event->topic }}">
                                    <div class="event-details">
                                        <h5>{{ $event->topic }}</h5>
                                        <p>{!! $event->description !!}</p>
                                        <a href="{{ route('events.details',$event->id) }}" class="btn btn-link">Event Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr>

                    <div class="past-events-title">Past Events</div>

                    <!-- Assuming you have a variable $pastEvents for past events -->
                    <div class="row">
                        @foreach($events as $event)
                            <div class="col-md-12">
                                <div class="event-card">
                                    <div class="event-date" style="padding: 10px">
                                        <span style="font-size: 13px">{{ \Carbon\Carbon::parse($event->from)->format('M') }}</span>
                                        <span>{{ \Carbon\Carbon::parse($event->from)->format('d') }}</span>
                                    </div>
                                    <img src="{{ asset($event->image != null ? 'storage/'.$event->image : 'images/event_default.png') }}" alt="{{ $event->topic }}">
                                    <div class="event-details">
                                        <h5>{{ $event->topic }}</h5>
                                        <p>{!! $event->description !!}</p>
                                        <a href="#" class="btn btn-link">Event Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- /.container -->
			</div> <!-- /.our-case -->

@endsection
