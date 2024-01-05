<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BoatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize(): bool
     {
         return true;
     }
 
     /**
      * Get the validation rules that apply to the request.
      *
      * @return array<string, string>
      */
     public function rules(): array
     {
         return [
             'name' => 'required|max:255',
             'description' => 'required|max:255',
             'image_path' => '',
         ];
     }

     protected function failedValidation(Validator $validator)
     {
            $response = response()->json([
                'errors' => $validator->errors(),
            ], 422);
    
            throw new \Illuminate\Validation\ValidationException($validator, $response);
     }
}