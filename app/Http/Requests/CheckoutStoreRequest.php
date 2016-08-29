<?php

namespace SEEK\Http\Requests;

use SEEK\Http\Requests\Request;

class CheckoutStoreRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'item_code' => 'required',
            'quantity' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'item_code' => array(
                    'required' => 'Please select an item.'
                ),
            'quantity' => array(
                    'required' => 'Please enter the quantity.',
                    'min' => 'At least 1 quantity is required.'
                ),
        ];
    }
}
