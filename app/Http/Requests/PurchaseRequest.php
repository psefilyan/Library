<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Support\Facades\Auth;

    class PurchaseRequest extends FormRequest
    {


        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules()
        {
            return [
                'type' => 'required|integer|between:1,2',
                'book_id'=>'required|exists:books,id',
            ];
        }
    }
