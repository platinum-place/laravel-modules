<?php

namespace Modules\Auth\app\Providers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Modules\Auth\app\Models\Client;

class PassportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Passport::ignoreRoutes();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Passport::tokensExpireIn(now()->addHour());
        Passport::useClientModel(Client::class);

        Auth::viaRequest('passport', function (Request $request) {
            $tokenId = Configuration::forSymmetricSigner(new Sha256, InMemory::plainText('empty', 'empty'))
                ->parser()
                ->parse($request->bearerToken())
                ->claims()
                ->get('jti');

            $token = Token::find($tokenId);

            if (empty($token)) {
                throw new Exception(__('Client not found.'));
            }

            return $token->client;
        });

        Config::set('auth.guards.api', [
            'driver' => 'passport',
        ]);
    }
}
