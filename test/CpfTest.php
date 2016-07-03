<?php
namespace CpfCnpjValidation;

use PHPUnit_Framework_TestCase;

class CpfTest extends PHPUnit_Framework_TestCase
{
    public function testValidCpf(){
        
        $cpfValidator = new Cpf();
        
        $this->assertTrue($cpfValidator->isValid('008.840.949-01'));
    }
    public function testInalidCpf(){
        
        $cpfValidator = new Cpf();
        
        $this->assertFalse($cpfValidator->isValid('008.840.949-00'));
    }
}