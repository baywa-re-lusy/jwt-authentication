<?php

namespace BayWaReLusy\JwtAuthentication;

class Token
{
    protected string $sub;
    protected string $iss;
    protected string $azp;
    protected ?string $email = null;
    protected ?string $name = null;
    protected int $exp;

    /**
     * @var string[]
     * @deprecated will be removed in favor of $scope array
     */
    protected array $permissions;

    /**
     * @var string[]
     */
    protected array $scope;

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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Token
     */
    public function setName(?string $name): Token
    {
        $this->name = $name;
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
     * @deprecated will be removed in favor of getScope()
     */
    public function getPermissions(): array
    {
        return $this->scope;
    }

    /**
     * @param string[] $permissions
     * @return Token
     * @deprecated will be removed in favor of setScope()
     */
    public function setPermissions(array $permissions): Token
    {
        $this->scope = $permissions;
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
}
