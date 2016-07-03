<?php
namespace CpfCnpjValidation;

use PHPUnit_Framework_TestCase;

class CpfTest extends PHPUnit_Framework_TestCase
{

    public function testValidCpf()
    {
        $cpfValidator = new Cpf();
        
        $this->assertTrue($cpfValidator->isValid('008.840.949-01'));
    }

    public function testInalidCpf()
    {
        $cpfValidator = new Cpf();
        
        $this->assertFalse($cpfValidator->isValid('008.840.949-00'));
    }

    public function testValidWhoIsInvalid()
    {
        $cpfValidator = new Cpf();
        //Lista de CPFs que passam na validação mas são inválidos pela Receita
        $this->assertFalse($cpfValidator->isValid('000.000.000-00'));
        $this->assertFalse($cpfValidator->isValid('111.111.111-11'));
        $this->assertFalse($cpfValidator->isValid('222.222.222-22'));
        $this->assertFalse($cpfValidator->isValid('333.333.333-33'));
        $this->assertFalse($cpfValidator->isValid('444.444.444-44'));
        $this->assertFalse($cpfValidator->isValid('555.555.555-55'));
        $this->assertFalse($cpfValidator->isValid('666.666.666-66'));
        $this->assertFalse($cpfValidator->isValid('777.777.777-77'));
        $this->assertFalse($cpfValidator->isValid('888.888.888-88'));
        $this->assertFalse($cpfValidator->isValid('999.999.999-99'));
    }
}
