<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            'category_id'=>['nullable','integer'],
            'name' => ['required','string','max:20'],
            'slug' => ['nullable','string'],

            'description' => ['required'],
            'yt_frame' => ['nullable','string'],
            
            'meta_title' => ['nullable','string'],
            'meta_description' => ['nullable','string'],

            'meta_keyword' => ['nullable','string'],
            'status' => ['nullable'],
         


        ];
        return $rules;
    }
}
