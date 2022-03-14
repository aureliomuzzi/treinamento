<?php

namespace App\Http\Controllers;

use App\Models\FastEvent;
use Illuminate\Http\Request;
use App\Http\Requests\FastEventRequest;

class FastEventController extends Controller
{
    public function store(FastEventRequest $request)
    {
        $event = FastEvent::create($request->all());

        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Registro cadastrado com sucesso!',
                'data' => $event,
            ]);
        }
    }

    public function update(FastEventRequest $request)
    {
        $event = FastEvent::where('id', $request->id)->first();
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
        $event = FastEvent::where('id', $request->id)->delete();

        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Registro deletado com sucesso!',
                'data' => $event,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Esse registro já foi excluído!',
                'data' => $event,
            ]);
        }
        //return response()->json(true);
    }
}
