<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HumanRequest extends FormRequest
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
        $humanId = $this->route('human');

        return [
            'name' => 'required',
            'start_day' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'address1' => 'required',
            'phone' => 'required|unique:humans,phone,'.$humanId,
            //'idnum' => 'required|unique:humans,idnum,'.$humanId,
            'job' => 'required',
            //'location' => 'required',
            'photo' => 'mimes:jpeg,png,bmp',
            'location' => 'required',
            'humans_level' => 'required',   
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
