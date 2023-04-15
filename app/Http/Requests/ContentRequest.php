<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'tmdb_id' => 'nullable',
            'title' => 'required',
            'slug' => 'unique:contents',
            'cover' => 'nullable',
            'poster' => 'nullable',
            'overview' => 'nullable',
            'content_type' => 'required',
            'duration' => 'nullable',
            'trailer' => 'nullable',
            'release_date' => 'required',
            'rating' => 'required|numeric|min:0|max:10',
            'publish' => 'required|boolean',
            'feature' => 'required|boolean',
            'member_only' => 'required|boolean',
            'genres' => 'required|exists:genres,id',
            'services' => 'nullable',
            'link_types' => 'nullable',
            'link_urls' => 'nullable',
        ];
    }
}
