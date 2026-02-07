<?php

namespace App\Rules;

use App\Models\Organization;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueHandle implements ValidationRule
{
    /**
     * Run the validation rule.
     * Checks if the handle/username exists in EITHER the users table OR organizations table.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $userExists = User::where('username', $value)->exists();
        $orgExists = Organization::where('handle', $value)->exists();

        if ($userExists || $orgExists) {
            $fail('The :attribute has already been taken.');
        }
    }
}