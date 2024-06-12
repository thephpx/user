<?php

namespace Thephpx\User\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

use Thephpx\User\Actions\Fortify\CreateNewUser;
use Thephpx\User\Actions\Fortify\ResetUserPassword;
use Thephpx\User\Actions\Fortify\UpdateUserPassword;
use Thephpx\User\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        # Setup Views
        $this->setViews();
    }

    private function setViews()
    {
        Fortify::registerView(function () {
            return view('User::tablerui.auth.register');
        });

        Fortify::loginView(function () {
            return view('User::tablerui.auth.login');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('User::tablerui.auth.forgot-password');
        });

        Fortify::resetPasswordView(function (Request $request) {
            return view('User::tablerui.auth.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view('User::tablerui.auth.verify-email');
        });

        Fortify::confirmPasswordView(function () {
            return view('User::tablerui.auth.confirm-password');
        });

        Fortify::twoFactorChallengeView(function () {
            return view('User::tablerui.auth.two-factor-challenge');
        });
    }
}
