<?php

declare(strict_types=1);

namespace Shared\Application\Services;

use Shared\Application\Exceptions\AccessDeniedException;

interface SecurityServiceInterface
{
    /**
     * @throws AccessDeniedException
     */
    public function userAccess(): void;

    /**
     * @throws AccessDeniedException
     */
    public function adminAccess(): void;


    /**
     * @throws AccessDeniedException
     */
    public function superAdminAccess(): void;
}