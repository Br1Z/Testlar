<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MessageRequest extends Request
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
        // $input = Request::all();
        // if((auth()->user()->name) == $input['for_user'] ){
        //      return [
        //     'for_user'=>'required'
        // ];
        // }
       return [
            'for_user'=>'required|not_in:'.auth()->user()->name,
            'txt_message'=>'required'
        ];
    }

    public function messages()
    {

         return [
            'for_user.required' => 'Не выбрать пользователя',
            'for_user.not_in' => 'Нельзя отрпавить сообщение самому себе ',
            'txt_message.required' => 'Нельзя отправить пустое сообщение'
        ];
    }
}
