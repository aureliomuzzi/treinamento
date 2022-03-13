<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FastEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'start' => 'date_format:H:i:s|before:end',
            'end' => 'date_format:H:i:s|after:start',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Campo Titulo é Obrigatório.',
            'title.min' => 'Campo Titulo precisa de pelo menos 3 caracteres.',
            'start.date_format' => 'Preencha a Hora Inicial válida.',
            'start.before' => 'A Hora Incial deve ser menor que a Hora Final.',
            'end.date_format' => 'Preencha uma Hora Final válida.',
            'end.after' => 'A Hora Final deve ser maior que a Hora Inicial.',
        ];
    }

}
