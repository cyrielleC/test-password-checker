<?php
namespace Tests\AppBundle\PasswordChecker;

use AppBundle\PasswordChecker\AsciiChecker;
use PHPUnit\Framework\TestCase;

class AsciiCheckerTest extends TestCase
{
    /**
     * @var AsciiChecker
     */
    private $checker;
    
    protected function setUp()
    {
        $this->checker = new AsciiChecker();
    }
    
    public function testCheckTrue()
    {
        $this->assertTrue($this->checker->check('password'));
    }
    
    public function testCheckFalse()
    {
        $this->assertFalse($this->checker->check('é'));
    }
}
