<?php

namespace BayWaReLusy\JwtAuthentication;

use Firebase\JWT\CachedKeySet;
use Firebase\JWT\JWT;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class TokenService
{
    public function __construct(
        private readonly ClientInterface $httpClient,
        private readonly RequestFactoryInterface $httpFactory,
    ) {
    }

    /**
     * Validate the given JWT.
     *
     * @param string $token
     * @param CacheItemPoolInterface $jwkCache
     * @param string $jwksUrl
     * @return Token
     * @throws InvalidTokenException
     */
    public function validateToken(
        string $token,
        CacheItemPoolInterface $jwkCache,
        string $jwksUrl
    ): Token {
        $token    = str_replace('Bearer ', '', $token);
        $hydrator = new TokenHydrator();

        $keySet = new CachedKeySet(
            $jwksUrl,
            $this->httpClient,
            $this->httpFactory,
            $jwkCache
        );

        try {
            $decodedToken = JWT::decode($token, $keySet);
        } catch (\Throwable $e) {
            throw new InvalidTokenException($e->getMessage());
        }

        return $hydrator->hydrate((array)$decodedToken, new Token());
    }
}
