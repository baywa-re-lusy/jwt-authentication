<?php

namespace BayWaReLusy\JwtAuthentication;

use BayWaReLusy\JwtAuthentication\Token\Claim;

/**
 * Class UserIdentity
 */
class UserIdentity implements IdentityInterface
{
    use IdentityTrait;

    protected string $id;
    protected string $username;
    protected string $email;
    protected bool $emailVerified;
    protected ?\DateTime $created;
    /** @var Claim[]  */
    protected array $claims = [];

    /**
     * @return string
     */
    public function getRoleId(): string
    {
        return 'user_' . $this->getId();
    }

    /**
     * @param Token $jwtToken
     * @return UserIdentity
     */
    public static function createFromJWT(Token $jwtToken): UserIdentity
    {
        $identity = new UserIdentity();
        $identity
            ->setId($jwtToken->getSub())
            ->setUsername($jwtToken->getUsername())
            ->setEmailVerified($jwtToken->getEmailVerified())
            ->setEmail($jwtToken->getEmail())
            ->setEmailVerified($jwtToken->getEmailVerified())
            ->setClaims($jwtToken->getClaims());

        $identity->setScopes($jwtToken->getScopes());

        return $identity;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): UserIdentity
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): UserIdentity
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): UserIdentity
    {
        $this->email = $email;
        return $this;
    }

    public function getEmailVerified(): bool
    {
        return $this->emailVerified;
    }

    public function setEmailVerified(bool $emailVerified): UserIdentity
    {
        $this->emailVerified = $emailVerified;
        return $this;
    }

    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    public function setCreated(?\DateTime $created): UserIdentity
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return Claim[]
     */
    public function getClaims(): array
    {
        return $this->claims;
    }

    /**
     * @param Claim[] $claims
     * @return $this
     */
    public function setClaims(array $claims): UserIdentity
    {
        $this->claims = $claims;
        return $this;
    }
}
