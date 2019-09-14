<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrastofijoFormRequest extends FormRequest
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
            
            'luz'=>'numeric|required',
            'cable'=>'numeric|required',
            'agua'=>'numeric|required',
            'hipoteca'=>'numeric|required',
            'alquiler'=>'numeric|required',

            'otros'=>'numeric|required',
        ];
    }
}
