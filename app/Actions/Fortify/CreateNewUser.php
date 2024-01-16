<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

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

        if( $input['ref_code'] && $input['ref_code'] == 'DOCHAS2023'){

            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ],[
                'name.required' => 'İsim alanı boş bırakılamaz!',
                'name.string' => 'İsim alanı harflerden oluşmalıdır!',
                'name.max' => 'İsim alanı en fazla 255 karakterden oluşabilir',

                'email.required' => 'E-Posta alanı boş bırakılamaz',
                'email.string' => 'E-Posta alanı harflerden oluşmalıdır!',
                'email.email' => 'E-Posta alanına bir e-posta adresi yazmalısınız!',
                'email.unique' => 'Bu e-posta adresi daha önce kayıt edilmiş!',

                'password.confirmed' => 'Şifre ve şifre onayı eşleşmiyor!',
                'password' => 'Şifreniz en az 8 karakterden oluşmalıdır.',
            ])->validate();

            return User::create([
                'name' => $input['name'],
                'surname' => $input['surname'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);


        }else{
            throw ValidationException::withMessages([
                Fortify::username() => "Referans Kodu Geçersiz!",
            ]);
        }



    }
}
