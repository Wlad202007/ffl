<?php

namespace App\Http\Requests;

use App\Produc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProducRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('produc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'      => [
                'required'],
            'author_id' => [
                'required',
                'integer'],
        ];
    }
}
