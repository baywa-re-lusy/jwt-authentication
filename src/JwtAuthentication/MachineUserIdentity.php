<?php

namespace BayWaReLusy\JwtAuthentication;

use BayWaReLusy\JwtAuthentication\Token\Claim;

class MachineUserIdentity implements IdentityInterface
{
    use IdentityTrait;

    public const CONSOLE_APPLICATION = 'console';

    /** @var Claim[] */
    protected array $claims = [];
    protected string $applicationId;

    /**
     * @return string
     */
    public function getRoleId()
    {
        return 'm2m_' . $this->getApplicationId();
    }

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     * @return MachineUserIdentity
     */
    public function setApplicationId(string $applicationId): MachineUserIdentity
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    /**
     * @param Claim[] $claims
     * @return MachineUserIdentity
     */
    public function setClaims(array $claims): MachineUserIdentity
    {
        $this->claims = $claims;
        return $this;
    }

    /**
     * @return Claim[]
     */
    public function getClaims(): array
    {
        return $this->claims;
    }
}
