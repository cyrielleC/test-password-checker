<?php

namespace AppBundle\PasswordChecker;


class AsciiChecker implements PasswordCheckerInterface
{

    /**
     * @inheritdoc
     */
    public function check(string $password): bool
    {
        return 'ASCII' === mb_detect_encoding($password, 'ASCII', true);
    }

    /**
     * @inheritdoc
     */
    public function message(): string
    {
        return 'Not ACSII character detected, please strip your password from "accents" and other exoticities';
    }

}
