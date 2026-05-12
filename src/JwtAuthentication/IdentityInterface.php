<?php

namespace BayWaReLusy\JwtAuthentication;

use BayWaReLusy\JwtAuthentication\Token\Claim;
use Laminas\Permissions\Acl\Role\RoleInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface IdentityInterface extends RoleInterface, UserInterface
{
    /**
     * Return true/false whether the user has the given scope or not.
     * @param string $scope
     * @return bool
     */
    public function hasScope(string $scope): bool;

    /**
     * Add a scope to the user.
     * @param string $scope
     * @return IdentityInterface
     */
    public function addScope(string $scope): IdentityInterface;

    /**
     * Get the list of Scopes.
     * @return string[]
     */
    public function getScopes(): array;

    /**
     * Set the list of scopes.
     * @param string[] $scopes
     * @return IdentityInterface
     */
    public function setScopes(array $scopes): IdentityInterface;

    /**
     * @param Claim[] $claims
     * @return IdentityInterface
     */
    public function setClaims(array $claims): IdentityInterface;

    /**
     * @return Claim[]
     */
    public function getClaims(): array;

    /**
     * @param string[] $groups
     * @return IdentityInterface
     */
    public function setGroups(array $groups): IdentityInterface;

    /**
     * @return string[]
     */
    public function getGroups(): array;

    /**
     * @return string[]
     */
    public function getRoles(): array;

    public function eraseCredentials(): void;

    public function getUserIdentifier(): string;
}
