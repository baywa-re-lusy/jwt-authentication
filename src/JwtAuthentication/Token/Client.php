<?php

namespace BayWaReLusy\JwtAuthentication\Token;

use BayWaReLusy\JwtAuthentication\Token\Client\Role;

class Client
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var Role[]
     */
    private array $roles = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Client
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Role[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param Role $role
     * @return $this
     */
    public function addRole(Role $role): Client
    {
        $this->roles[] = $role;
        return $this;
    }
}
