<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'transaction_status' => 'required|string|in:PENDING,SUCCESS,CANCEL,FAILED',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
