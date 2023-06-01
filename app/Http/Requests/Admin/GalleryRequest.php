<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'travel_packages_uuid' => 'required|exists:travel_packages,uuid',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|sometimes',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
