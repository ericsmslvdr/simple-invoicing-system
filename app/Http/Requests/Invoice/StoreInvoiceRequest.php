<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'invoice_number' => 'required|string',
            'invoice_date' => 'required|date',
            'created_for' => 'required|exists:customers,id',
            'line_item.*.type' => 'required|in:PRODUCT,SERVICE',
            'line_item.*.quantity' => 'required|numeric',
            'line_item.*.base_price' => 'required|numeric',
            'line_item.*.subtotal' => 'required|numeric',
            'discount' => 'required|numeric',
            'vat' => 'required|numeric',
            'grand_price' => 'required|numeric'
        ];
    }
}
