<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FastEvent;

class FullcalendarController extends Controller
{
    public function index()
    {
        $fastEvents = FastEvent::all();

        return view('fullcalendar.master', [
            'fastEvents' => $fastEvents
        ]);
    }
}
