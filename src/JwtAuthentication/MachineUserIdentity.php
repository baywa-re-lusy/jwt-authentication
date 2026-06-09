<?php

namespace BayWaReLusy\JwtAuthentication;

use BayWaReLusy\JwtAuthentication\Token\Claim;
use Deprecated;

class MachineUserIdentity implements IdentityInterface
{
    use IdentityTrait;

    public const CONSOLE_APPLICATION = 'console';

    /** @var Claim[] */
    protected array $claims = [];
    /**
     * @var non-empty-string $applicationId
     */
    protected string $applicationId;

    /** @var string[] */
    protected array $groups = [];

    /** @var string[] */
    protected array $roles = [];

    /**
     * @return string
     */
    public function getRoleId()
    {
        return 'm2m_' . $this->getApplicationId();
    }

    /**
     * @return non-empty-string
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * @param non-empty-string $applicationId
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

    /**
     * @param string[] $roles
     * @return $this
     */
    public function setRoles(array $roles): MachineUserIdentity
    {
        $this->roles = $roles;
        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    #[Deprecated]
    public function eraseCredentials(): void
    {
        // We do not store sensitive information
    }

    /**
     * @return non-empty-string
     */
    public function getUserIdentifier(): string
    {
        return $this->getApplicationId();
    }
}
