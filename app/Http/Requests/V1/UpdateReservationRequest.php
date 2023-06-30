<?php

namespace App\Http\Requests\V1;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->phone === $this->phoneNumber;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method === 'PUT') {
            return [
                'start' => ['required', 'date', 'before:end'],
                'end' => ['required', 'date', 'after:start'],
                'gameType' => ['required', 'string', Rule::in(['singles', 'doubles'])],
                'courtId' => ['required', 'exists:App\Models\Court,id'],
                'phoneNumber' => ['required', 'exists:App\Models\User,phone'],
            ];
        } else {
            return [
                'start' => ['sometimes', 'required', 'date', 'before:end'],
                'end' => ['sometimes', 'required', 'date', 'after:start'],
                'gameType' => ['sometimes', 'required', 'string', Rule::in(['singles', 'doubles'])],
                'courtId' => ['sometimes', 'required', 'exists:App\Models\Court,id'],
                'phoneNumber' => ['sometimes', 'required', 'exists:App\Models\User,phone'],
            ];
        }
    }

    protected function passedValidation()
    {
        $merge_arr = [];

        if ($this->gameType) {
            $merge_arr['game_type'] = $this->gameType;
        }

        if ($this->courtId) {
            $merge_arr['court_id'] = $this->courtId;
        }

        if ($this->phoneNumber) {
            $merge_arr['user_id'] = User::where('phone', $this->phoneNumber)->first()->id;
        }
        
        $this->merge($merge_arr);
    }
}
