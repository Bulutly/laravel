<?php
namespace Bulutly\Laravel\Http\Requests\V1\Projects;

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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
        ];
    }


}