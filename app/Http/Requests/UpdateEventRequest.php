<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title'=>'required|min:3|max:100',
            'address'=>'required|min:3|max:100',
            'image'=>'image',
            'start_date'=>'required',
            'end_date'=>'required',
            'start_time'=>'required',
            'num_tickets'=>'required',
            'description'=>'required',
            'country_id'=>'required',
            'city_id'=>'required',
            'tags.*'=>'required'
        ];
    }
}
