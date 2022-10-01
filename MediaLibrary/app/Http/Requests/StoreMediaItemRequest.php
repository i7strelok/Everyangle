<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaItemRequest extends FormRequest
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
        $mediaTypeName = $this->request->get('media_type');
        $mediaTypes = \App\MediaTypes\AbstractMediaType::getMediaTypes();
        $rules = [
            'name' => 'required|unique:media_items|max:60|min:2',
            'description' => 'max:200',
            'media_type' => 'required|string|in:'.implode(',', array_keys($mediaTypes)), 
        ];

        if(isset($mediaTypes[$mediaTypeName])){
            $mimesTypes = $mediaTypes[$mediaTypeName]->getMimeTypes();
            $rules['file'] = 'required|file|max:50000|mimetypes:'.implode(',', $mimesTypes);
        }

        return $rules;        
    }
}
