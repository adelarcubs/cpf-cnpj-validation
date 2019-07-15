<?php
namespace CpfCnpjValidation;

use PHPUnit\Framework\TestCase;

class CnpjTest extends TestCase
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
        $this->assertFalse($cnpjValidator->isValid('75.418.185/0001-00'));
    }

    public function testEmpty()
    {
        $cnpjValidator = new Cnpj();
        $this->assertFalse($cnpjValidator->isValid(''));
    }

    public function testMoreThan14()
    {
        $cnpjValidator = new Cnpj();
        $this->assertFalse($cnpjValidator->isValid('111222333444555'));
    }

    public function testEmptyMessage()
    {
        $cnpjValidator = new Cnpj();
        $this->assertEmpty($cnpjValidator->getMessages());
    }
}
