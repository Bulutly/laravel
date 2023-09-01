<?php
namespace Bulutly\Laravel\Http\Requests\V1\Terminals\Experts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'expert' => 'required|file',
            'setting' => 'nullable|file',
            'symbol' => 'required|string',
            'timeframe' => 'required|string',
        ];
    }


}