<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('mysqlerp.llx_user')->ignore($user->rowid, 'rowid')],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            // 'identification' => ['required', 'string', Rule::unique('mysqlerp.llx_societe', 'siren')->ignore($user->rowid)],
            'gender' => ['required', 'in:M,F,O'],
            'user_mobile' => ['required', 'regex:/^\(\d{3}\)-\d{3}-\d{4}$/i']
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'gender' => $input['gender'],
                'lastname' => $input['lastname'],
                'firstname' => $input['firstname'],
                'user_mobile' => $input['user_mobile'],
                'email' => $input['email']
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'gender' => $input['gender'],
            'lastname' => $input['lastname'],
            'firstname' => $input['firstname'],
            'user_mobile' => $input['user_mobile'],
            'email' => $input['email']
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
