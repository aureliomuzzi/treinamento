<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function loadEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(EventRequest $request)
    {
        $event = Event::create($request->all());

        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Registro cadastrado com sucesso!',
                'data' => $event,
            ]);
        }
    }

    public function update(EventRequest $request)
    {
        $event = Event::where('id', $request->id)->first();
        $event->fill($request->all());
        $event->save();

        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Registro atualizado com sucesso!',
                'data' => $event,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Falha ao atualizar o registro!',
                'data' => $event,
            ]);
        }
    }

    public function destroy(Request $request)
    {
        Event::where('id', $request->id)->delete();

        return response()->json(true);
    }
}
