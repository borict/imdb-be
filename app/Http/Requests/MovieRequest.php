<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'images' => 'min:1',
            'images.*.url' => ['regex:/^(http)?s?:?(\/\/[^\']*\.(?:png|jpg|jpeg))/'],
            'genre' => 'required'
        ];
    }
}
