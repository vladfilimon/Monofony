<?php

/*
 * This file is part of the Monofony package.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Monofony\Contracts\Core\Model\User;

use Sylius\Component\Customer\Model\CustomerAwareInterface;
use Sylius\Component\User\Model\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

interface AppUserInterface extends UserInterface, CustomerAwareInterface, PasswordAuthenticatedUserInterface
{
    public function getPassword(): ?string;
}
