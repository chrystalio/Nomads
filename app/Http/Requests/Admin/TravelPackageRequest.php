<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelPackageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'about' => 'required|string',
            'featured_event' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'foods' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'duration' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
