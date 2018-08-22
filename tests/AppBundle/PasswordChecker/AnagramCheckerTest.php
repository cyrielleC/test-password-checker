<?php
namespace Tests\AppBundle\PasswordChecker;

use AppBundle\PasswordChecker\AnagramChecker;
use PHPUnit\Framework\TestCase;

class AnagramCheckerTest extends TestCase
{
    /**
     * @var AnagramChecker
     */
    private $checker;
    
    protected function setUp()
    {
        $this->checker = new AnagramChecker();
    }
    
    public function testCheckTrue()
    {
        $this->assertTrue($this->checker->check('passwords'));        
        $this->assertTrue($this->checker->check('passwor'));
    }
    
    public function testCheckFalse()
    {
        $this->assertFalse($this->checker->check('password'));
        $this->assertFalse($this->checker->check('drowssap'));
    }
}
