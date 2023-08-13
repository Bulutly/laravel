<?php
namespace Bulutly\Laravel\Http\Requests\V1\Buluts\ENVs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'key' => 'required_if:value,null|string',
            'value' => 'required_if:key,null|string',
        ];
    }


}