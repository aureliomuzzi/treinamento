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
        // Event::create($request->all());
        // return response()->json(true);
        // return redirect('/clientes')->with(['tipo'=>'success', 'mensagem'=>'Registro criado com sucesso!']);
        // return redirect()->back()->withErrors(['tipo'=>'danger', 'mensagem'=>'Erro ao realizar operação.']);
        // return response()->json([
        //     'success' => false,
        //     'message' => 'Todos os campos precisam ser preenchidos.',
        // ]);

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
        // return response()->json(true);
        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Registro atualizado com sucesso!',
                'data' => $event,
            ]);
        }
    }
}
