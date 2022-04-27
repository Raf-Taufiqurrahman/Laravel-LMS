<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesUpdateRequest extends FormRequest
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
            'name' => 'required','unique:series,name,'.$this->slug,
            'price' => 'required',
            'description' => 'required',
            'cover' =>'mimes:jpg,png,jpeg',
            'level' => 'required',
            'status' => 'required'
        ];
    }
}
