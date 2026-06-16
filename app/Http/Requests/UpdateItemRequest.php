<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'category_id' => 'sometimes|required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama item wajib diisi jika kolom ini dikirim.',
            'quantity.integer' => 'Jumlah harus berupa angka bulat.',
            'price.numeric' => 'Harga harus berupa angka.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
        ];
    }
    protected function prepareForValidation() {
    $input = $this->all();

    // Menyisir kiriman data dan melakukan trim serta strip_tags jika tipenya string
        array_walk($input, function (&$val) {
            if (is_string($val)) {
                $val = trim(strip_tags($val));
            }
        });

        $this->merge($input); // Memasukkan kembali data yang sudah bersih ke dalam request
    }
}