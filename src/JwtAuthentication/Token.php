<?php

namespace BayWaReLusy\JwtAuthentication;

class Token
{
    protected string $sub;
    protected string $iss;
    protected int $exp;

    /**
     * @var array
     * @deprecated will be removed in favor of $scope array
     */
    protected array $permissions;

    /**
     * @var array
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
     * @return array
     * @deprecated will be removed in favor of getScope()
     */
    public function getPermissions(): array
    {
        return $this->scope;
    }

    /**
     * @param array $permissions
     * @return Token
     * @deprecated will be removed in favor of setScope()
     */
    public function setPermissions(array $permissions): Token
    {
        $this->scope = $permissions;
        return $this;
    }

    /**
     * @return array
     */
    public function getScope(): array
    {
        return $this->scope;
    }

    /**
     * @param array $scope
     * @return Token
     */
    public function setScope(array $scope): Token
    {
        $this->scope = $scope;
        return $this;
    }
}
