<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
            'tmdb_id' => 'unique:contents|nullable|integer',
            'title' => 'required',
            'slug' => 'unique:contents|required',
            'cover' => 'nullable',
            'poster' => 'nullable',
            'overview' => 'nullable',
            'content_type' => 'required|in:movie,series',
            'duration' => 'nullable|integer|min:1',
            'trailer' => 'nullable|url',
            'release_date' => 'required|date',
            'rating' => 'required|numeric|between:0,10',
            'publish' => 'required|boolean',
            'feature' => 'required|boolean',
            'member_only' => 'required|boolean',
            'genres' => 'required|exists:genres,id|array',
            'link_providers' => 'nullable|array',
            'link_types' => 'nullable|array',
            'link_urls' => 'nullable|array',
            'link_providers.*' => 'string',
            'link_types.*' => 'string',
            'link_urls.*' => 'url',
        ];
    }

    public function movieData()
    {
        return $this->only(['tmdb_id', 'title', 'slug', 'cover', 'poster', 'overview', 'content_type', 'duration', 'trailer', 'release_date', 'rating', 'publish', 'feature', 'member_only']);
    }

    public function linkData()
    {
        return $this->only(['link_providers', 'link_types', 'link_urls']);
    }

    public function genreIds()
    {
        return $this->input('genres', []);
    }

    public function messages()
    {
        return [
            'link_providers.*.required' => 'The provider field is required.',
            'link_types.*.required' => 'The type field is required.',
            'link_urls.*.url' => 'The URL field must be a valid URL.',
        ];
    }
}
