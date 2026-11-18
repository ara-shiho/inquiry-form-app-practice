<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255'],
            'tel' => ['required','numeric','regex:/^[0-9]{10,11}$/'],
            'content' => ['required','string'],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '名前を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'tel.required' => '電話番号を入力してください。',
            'content.required' => 'お問い合わせ内容を入力してください。'
        ];
    }
}
