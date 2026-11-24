<?php

namespace BayWaReLusy\JwtAuthentication\Token;

class Claim
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string[]
     */
    private array $values = [];

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
    public function setName(string $name): Claim
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setValues(array $values): Claim
    {
        $this->values = $values;
        return $this;
    }
}
