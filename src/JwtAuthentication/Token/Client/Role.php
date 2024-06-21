<?php

namespace BayWaReLusy\JwtAuthentication\Token\Client;

class Role
{
    /**
     * @var string
     */
    private string $name;

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
    public function setName(string $name): Role
    {
        $this->name = $name;
        return $this;
    }
}
