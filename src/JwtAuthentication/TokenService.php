<?php

namespace BayWaReLusy\JwtAuthentication;

use Firebase\JWT\CachedKeySet;
use Firebase\JWT\JWT;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Client as HttpClient;
use Psr\Cache\CacheItemPoolInterface;

class TokenService
{
    public function validateToken(
        string $token,
        CacheItemPoolInterface $tokenCache,
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
            $tokenCache
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
