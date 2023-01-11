<?php

namespace BayWaReLusy\JwtAuthentication;

class Token
{
    protected string $sub;
    protected string $iss;
    protected string $azp;
    protected ?string $email = null;
    protected int $exp;

    /**
     * @var string[]
     */
    protected array $scope;

    /**
     * @var string
     */
    protected string $preferredUsername;

    /**
     * @var bool
     */
    protected bool $emailVerified;

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
    public function getAzp(): string
    {
        return $this->azp;
    }

    /**
     * @param string $azp
     * @return Token
     */
    public function setAzp(string $azp): Token
    {
        $this->azp = $azp;
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
    public function getScope(): array
    {
        return $this->scope;
    }

    /**
     * @param string[] $scope
     * @return Token
     */
    public function setScope(array $scope): Token
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreferredUsername(): string
    {
        return $this->preferredUsername;
    }

    /**
     * @param string $preferredUsername
     * @return Token
     */
    public function setPreferredUsername(string $preferredUsername): Token
    {
        $this->preferredUsername = $preferredUsername;
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
}
