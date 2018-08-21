<?php

namespace AppBundle\PasswordChecker;


class AsciiChecker implements PasswordCheckerInterface
{

    /**
     * @inheritdoc
     */
    public function check(string $password): bool
    {
        return ( bool ) ! preg_match( '/[\\x80-\\xff]+/' , $password );
    }

    /**
     * @inheritdoc
     */
    public function message(): string
    {
        return 'Not ACSII character detected, please strip your password from "accents" and other exoticities';
    }

}