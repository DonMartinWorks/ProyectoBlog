<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'max:100', Rule::unique('posts', 'name')->ignore($this->route('post'))],
            'slug' => ['required', 'max:100', Rule::unique('posts', 'slug')->ignore($this->route('post'))],
            'status' => ['required', 'in:1,2']
        ];

        # Si el usuario deja un post como borrador, permite anular algunos
        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => ['required'],
                'tags' => ['required'],
                'extract' => ['required'],
                'body' => ['required'],
            ]);
        }

        return $rules;
    }
}
