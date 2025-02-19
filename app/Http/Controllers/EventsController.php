<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query();

        if ($request->has('from') && $request->from != '') {
            $events->where('from', '>=', $request->from);
        }

        if ($request->has('to') && $request->to != '') {
            $events->where('to', '<=', $request->to);
        }

        $events = $events->paginate(10);
        return view('frontend/events.index', compact('events'));
    }

    public function details(Event $event)
    {
        return view('frontend/events.details', compact('event'));
    }
}
