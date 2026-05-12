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

    /** @var string[] */
    protected array $groups = [];

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

    /**
     * @param array<string> $groups
     * @return MachineUserIdentity
     */
    public function setGroups(array $groups): MachineUserIdentity
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getGroups(): array
    {
        return $this->getGroups();
    }
}
