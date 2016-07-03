<?php
namespace CpfCnpjValidation;

use PHPUnit_Framework_TestCase;

class CnpjTest extends PHPUnit_Framework_TestCase
{
    public function testValidCnpj()
    {
        
        $cnpjValidator = new Cnpj();
        
        $this->assertTrue($cnpjValidator->isValid('75.418.185/0001-58'));
    }
    public function testInalidCpf()
    {
        
        $cnpjValidator = new Cnpj();
        
        $this->assertFalse($cnpjValidator->isValid('75.418.185/0001-51'));
    }
}
