<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|min:10',
            'start' => 'date_format:Y-m-d H:i:s|before:end',
            'end' => 'date_format:Y-m-d H:i:s|after:start',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Campo Titulo é Obrigatório.',
            'title.min' => 'Campo Titulo precisa de pelo menos 10 caracteres.',
            'start.date_format' => 'Preencha uma Data Inicial válida.',
            'start.before' => 'A Data/Hora Incial deve ser menor que a Data/Hora Final.',
            'end.date_format' => 'Preencha uma Data Final válida.',
            'end.after' => 'A Data/Hora Final deve ser maior que a Data/Hora Inicial.',
        ];
    }
}
