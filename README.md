BayWa r.e. JWT Authentication
=============================

[![CircleCI](https://dl.circleci.com/status-badge/img/gh/baywa-re-lusy/jwt-authentication/tree/main.svg?style=svg)](https://dl.circleci.com/status-badge/redirect/gh/baywa-re-lusy/jwt-authentication/tree/main)

## Installation

To install the JWT Authentication service, you will need [Composer](http://getcomposer.org/) in your project:

```bash
composer require baywa-re-lusy/jwt-authentication
```

## Usage example code for Laminas projects

In `Module.php`:
```php
use BayWaReLusy\JwtAuthentication\TokenService;
use Laminas\Cache\Psr\CacheItemPool\CacheItemPoolDecorator;
use BayWaReLusy\JwtAuthentication\Token;

public function onAuthentication(MvcAuthEvent $e): IdentityInterface
{
    $jwt                          = ...; // The JSON Web Token
    $laminasCacheStorageInterface = ...; // Instance of Laminas\Cache\Storage\StorageInterface
    $jwksUrl                      = ...; // URL from where to get JWKs
    $cache                        = new CacheItemPoolDecorator($laminasCacheStorageInterface);
    
    $tokenService = new TokenService();
    
    try {
        $token = $tokenService->validateToken($jwt, $cache, $jwksUrl);
    } catch (\BayWaReLusy\JwtAuthentication\InvalidTokenException $e) {
        return new GuestIdentity();
    }
    
    ...
}
```
