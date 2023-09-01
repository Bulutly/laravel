<?php
namespace Bulutly\Laravel\Http\Requests\V1\Terminals;

use Bulutly\Laravel\Enums\Bulut\Region;
use Bulutly\Laravel\Enums\Terminal\Version;
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
            'name' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
            'project_id' => 'required|uuid',
            'region' => 'required|integer|in:'.implode(',', Region::toArray()),
            'version' => 'required|integer|in:'.implode(',', Version::toArray()),
            'login' => 'required|string',
            'password' => 'required|string',
            'server_name' => 'required|string',
            'server_file' => 'nullable|file',
        ];
    }


}