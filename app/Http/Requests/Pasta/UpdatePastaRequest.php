<?php

namespace App\Http\Requests\Pasta;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePastaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'src' => 'required|url|max:255',
            'title' => 'required|max:50',
            'kind' => [
                'required',
                Rule::in(['corta', 'lunga', 'lunghissima'])
            ],
            'cooking_time' => 'required|max:10',
            'weight' => 'required|max:10',
            'description' => 'nullable|max:65535'
        ];
    }


    public function messages() {
        return [
            'src.required' => "Url dell'immagine richiesta",
            'src.url' => "L'url dell'immagine deve essere valida, esempio: http://www.miosito.com",
            'src.max' => "L'url dell'immagine deve essere al massimo di 255 caratteri",
            'title.required' => "Il titolo è richiesto",
            'title.max' => "Il titolo deve essere al massimo di 50 caratteri",
            'kind.required' => "Il tipo è richiesto",
            'kind.max' => "Il tipo deve essere al massimo di 20 caratteri",
            'kind.in' => "Valore fornito non valido",
            'cooking_time.required' => "Il tempo di cottura è richiesto",
            'cooking_time.max' => "Il tempo di cottura deve essere al massimo di 10 caratteri",
            'weight.required' => "Il peso è richiesto",
            'weight.max' => "Il campo peso deve essere al massimo di 10 caratteri",
            'description.max' => "La descrizione deve essere lunga al massimo 65535 caratteri",
        ];
    }
}
