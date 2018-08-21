<?php

namespace AppBundle\PasswordChecker;


interface PasswordCheckerInterface
{
    /**
     * Returns true if the password meets the Checker requirements
     * @param string $password
     * @return bool
     */
    public function check(string $password): bool;

    /**
     * Returns the error message
     * @return string
     */
    public function message(): string;
}