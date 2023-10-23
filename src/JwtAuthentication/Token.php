<?php

namespace BayWaReLusy\JwtAuthentication;

class Token
{
    protected string $sub;
    protected string $iss;
    protected string $clientId;
    protected ?string $email = null;
    protected int $exp;

    /** @var string[] */
    protected array $scopes = [];

    /** @var string[] */
    protected array $roles = [];

    /**
     * @var string
     */
    protected string $username;

    /**
     * @var bool
     */
    protected bool $emailVerified;

    /**
     * @var array<string, array<int>>
     */
    protected array $claims = [];

    /**
     * @return string
     */
    public function getSub(): string
    {
        return $this->sub;
    }

    /**
     * @param string $sub
     * @return Token
     */
    public function setSub(string $sub): Token
    {
        $this->sub = $sub;
        return $this;
    }

    /**
     * @return string
     */
    public function getIss(): string
    {
        return $this->iss;
    }

    /**
     * @param string $iss
     * @return Token
     */
    public function setIss(string $iss): Token
    {
        $this->iss = $iss;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     * @return Token
     */
    public function setClientId(string $clientId): Token
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Token
     */
    public function setEmail(?string $email): Token
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getExp(): int
    {
        return $this->exp;
    }

    /**
     * @param int $exp
     * @return Token
     */
    public function setExp(int $exp): Token
    {
        $this->exp = $exp;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getScopes(): array
    {
        return $this->scopes;
    }

    /**
     * @param string[] $scopes
     * @return Token
     */
    public function setScopes(array $scopes): Token
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param string[] $roles
     * @return Token
     */
    public function setRoles(array $roles): Token
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Token
     */
    public function setUsername(string $username): Token
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEmailVerified(): bool
    {
        return $this->emailVerified;
    }

    /**
     * @param bool $emailVerified
     * @return Token
     */
    public function setEmailVerified(bool $emailVerified): Token
    {
        $this->emailVerified = $emailVerified;
        return $this;
    }

    public function getClaims(): array
    {
        return $this->claims;
    }

    public function setClaims(array $claims): void
    {
        $this->claims = $claims;
    }

}
