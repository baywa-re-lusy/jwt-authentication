<?php

namespace BayWaReLusy\JwtAuthentication;

use Firebase\JWT\CachedKeySet;
use Firebase\JWT\JWT;
use GuzzleHttp\Psr7\HttpFactory;
use Laminas\Cache\Psr\CacheItemPool\CacheItemPoolDecorator;
use Laminas\Cache\Storage\StorageInterface as Cache;
use GuzzleHttp\Client as HttpClient;

class TokenService
{
    public function validateToken(
        string $token,
        Cache $tokenCache,
        string $jwksUrl
    ): Token {
        $token       = str_replace('Bearer ', '', $token);
        $hydrator    = new TokenHydrator();
        $httpClient  = new HttpClient();
        $httpFactory = new HttpFactory();

        $keySet = new CachedKeySet(
            $jwksUrl,
            $httpClient,
            $httpFactory,
            new CacheItemPoolDecorator($tokenCache)
        // $expiresAfter int seconds to set the JWKS to expire
        // $rateLimit    true to enable rate limit of 10 RPS on lookup of invalid keys
        );

        // Validate the Token
        try {
            $decodedToken = JWT::decode($token, $keySet);
        } catch (\Throwable $e) {
            throw new InvalidTokenException($e->getMessage());
        }

        return $hydrator->hydrate((array)$decodedToken, new Token());
    }
}
