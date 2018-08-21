<?php

declare(strict_types=1);

namespace AppBundle\Service;

use AppBundle\PasswordChecker\PasswordCheckerInterface;

class PasswordChecker
{
    /**
     * @var PasswordCheckerInterface[]
     */
    private $checkers;


    /**
     * Check a password against all configured PasswordChecker classes
     *
     * @param string $password
     *
     * @return string|null an error message, or null if password is valid
     */
    public function check(string $password): ?string
    {
        foreach ($this->checkers as $checker){
            if (false === $checker->check($password)) {
                return $checker->message();
            }
        }
        return null;
    }


    /**
     * Method used by container to inject checkers
     * @param PasswordCheckerInterface $checker
     */
    public function addChecker(PasswordCheckerInterface $checker){
        $this->checkers[] = $checker;
    }
}
