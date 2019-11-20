<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Carbon\Carbon;
use Exception;
use Faker\Factory;
use Socialite;
use Log;

class SocialAuthController extends Controller
{
    /**
     * Redirect to Google
     *
     * @return mixed
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Callback from Google
     * - Redirect to homepage if user exist
     * - Register user if user not exist and redirect to homepage
     *
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function googleCallback()
    {
        $driver = 'google';
        try {
            $googleUser = Socialite::driver($driver)->user();
            $this->createOrGetUser($googleUser, $driver);
            return redirect()->route('home');
        }
        catch (Exception $e) {
            Log::error($e);
            return 'error';
        }
    }

    /**
     * Redirect to Facebook
     *
     * @return mixed
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Callback from Facebook
     * - Redirect to homepage if user exist
     * - Register user if user not exist and redirect to homepage
     *
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function facebookCallback()
    {
        $driver = 'facebook';
        try {
            $fbUser = Socialite::driver($driver)->user();
            $this->createOrGetUser($fbUser, $driver);
            return redirect()->route('home');
        }
        catch (Exception $e) {
            Log::error($e);
            return 'error';
        }
    }

    /**
     * Generating unique username by email
     *
     * @param $email string -> 'username@example.com'
     * @return string
     */
    private function generateUniqueUsernameByEmail(string $email) : string
    {
        $username = $new_username = preg_match("/^[a-zA-Z0-9]+$/", strtolower(explode('@', $email)[0]));
        $next = 2;
        while (User::where('username', '=', $username)->first()) {
            $username = "{$new_username}.{$next}";
            $next++;
        }

        return $username;
    }

    /**
     * Create or get user from social media
     *
     * @param $socialUser
     * @param $driver
     */
    private function createOrGetUser($socialUser, $driver)
    {
        $existUser = User::where('email', $socialUser->email)->first();
        $userId = $driver.'_id';
        if($existUser) {
            Auth::loginUsingId($existUser->id);
            if(is_null($existUser->$userId)) {
                $existUser->update([$userId => $socialUser->id]);
            }
        } else {
            $user = new User;
            $faker = Factory::create();
            $username = $this->generateUniqueUsernameByEmail($socialUser->name);

            $user->name = $socialUser->name;
            $user->email = $socialUser->email;
            $user->username = $username;
            $user->email_verified_at = Carbon::now();
            $user->$userId = $socialUser->id;
            $user->password = $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}');
            $user->save();
            Auth::loginUsingId($user->id);
        }
    }
}
