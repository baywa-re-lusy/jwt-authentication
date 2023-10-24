<?php

namespace BayWaReLusy\JwtAuthentication;

class MachineUserIdentity implements IdentityInterface
{
    use IdentityTrait;

    public const CONSOLE_APPLICATION = 'console';

    protected array $claims;

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
     * @param array $claims
     * @return MachineUserIdentity
     */
    public function setClaims(array $claims): MachineUserIdentity
    {
        $this->claims = $claims;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClaims(): array
    {
        return $this->claims;
    }
}
