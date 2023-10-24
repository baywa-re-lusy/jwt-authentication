<?php

namespace BayWaReLusy\JwtAuthentication;

use BayWaReLusy\JwtAuthentication\Token\Claim;
use Laminas\Permissions\Acl\Role\RoleInterface;

interface IdentityInterface extends RoleInterface
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
     * @param array<Claim> $claims
     * @return IdentityInterface
     */
    public function setClaims(array $claims): IdentityInterface;

    /**
     * @return array<Claim>
     */
    public function getClaims(): array;
}
