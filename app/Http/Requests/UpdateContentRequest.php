<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContentRequest extends FormRequest
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
            'slug' => ['required', Rule::unique('contents')->ignore($this->movie->id)],
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
            'link_providers' => 'nullable',
            'link_types' => 'nullable',
            'link_urls' => 'nullable',
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
}
