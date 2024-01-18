<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        $validated = Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
            'name' => ['string', 'max:50', 'nullable'],
            'ns_username' => ['string', 'max:50', 'nullable'],
            'birthday' => ['date', 'date_format:d-m-Y', 'before_or_equal:today', 'after_or_equal:1900-01-01', 'nullable'],
            'content' => ['string', 'max:1000', 'nullable']
        ])
        ->setAttributeNames([
            'name' => 'navn',
            'ns_username' => 'netstations brugernavn',
            'birthday' => 'fødselsdag',
            'content' => 'profil tekst'
        ])
        ->validated();

        if ($validated['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $validated);
        } else {
            $user->update($validated);
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $validated)
    {
        $user->update($validated);

        $user->sendEmailVerificationNotification();
    }
}
