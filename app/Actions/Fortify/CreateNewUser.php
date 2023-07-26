<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'surname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'katakana'],
            'surame_kana' => ['required', 'string', 'max:255', 'katakana'],
            'phone_number' => ['required', 'tel'],
            'postal_code' =>[ 'required', 'zipcode', 'max:7'],
            'prefectures' =>[ 'required' ],
            'city' => [ 'required' ],
            'block' => [ 'required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();
        
        $file = $input['file'];
        $name = $file->getClientOriginalName();
    

        $user = User::create([
            'path' => isset($name)? $name : null,
            'surname' => $input['surname'],
            'name' => $input['name'],
            'surame_kana' => $input['surame_kana'],
            'name_kana' => $input['name_kana'],
            'phone_number' => $input['phone_number'],
            'email' => $input['email'],
            'postal_code' => $input['postal_code'],
            'prefectures' => $input['prefectures'],
            'city' => $input['city'],
            'block' => $input['block'],
            'password' => Hash::make($input['password'])
        ]);
        $file->storeAs('users'.$user->id, $name, 'public');
        return $user;
    }
}
