<?php

namespace App\Http\Requests\V1;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
        return [
            
            'start' => ['required', 'date', 'before:end'],
            'end' => ['required', 'date', 'after:start'],
            'gameType' => ['required', 'string', Rule::in(['singles', 'doubles'])],
            'courtId' => ['required', 'exists:App\Models\Court,id'],
            'phoneNumber' => ['required', 'exists:App\Models\User,phone'],


        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'game_type' => $this->gameType,
            'court_id' => $this->courtId,
            'user_id' => User::where('phone', $this->phoneNumber)->first()->id,
        ]);
    }
}
