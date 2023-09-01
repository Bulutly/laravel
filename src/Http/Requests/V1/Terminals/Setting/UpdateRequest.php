<?php
namespace Bulutly\Laravel\Http\Requests\V1\Terminals\Setting;

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
            'login' => 'nullable|string',
            'password' => 'nullable|string',
            'server' => 'nullable|string',
            'max_bars' => 'nullable|string',
            'news' => 'nullable|string',
            'live_trading' => 'nullable|string',
            'dll_import' => 'nullable|string',
        ];
    }


}