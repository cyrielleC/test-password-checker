<?php

namespace AppBundle\PasswordChecker;


class AnagramChecker implements PasswordCheckerInterface
{
    const UNWANTED_ANAGRAM_WORD = 'password';

    /**
     * @inheritdoc
     */
    public function check(string $password): bool
    {
        return count_chars(self::UNWANTED_ANAGRAM_WORD,1) !== count_chars($password, 1);
    }

    /**
     * @inheritdoc
     */
    public function message(): string
    {
        return 'Your password is an anagram of password. Please do not.';
    }

}