<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediaItemRequest extends FormRequest
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
        $mediaItem = $this->route('mediaitem');
        $rules = [
            'name' => 'required|unique:media_items,name,'.$mediaItem->id,
            'description' => 'max:200',
            'categories' => 'required',
            'categories.*' => 'exists:categories,id',
        ];
        return $rules;  
    }
}
