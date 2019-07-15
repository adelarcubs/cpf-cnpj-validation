<?php
declare(strict_types = 1);
namespace CpfCnpjValidation;

use Zend\Validator\AbstractValidator;

class Cpf extends AbstractValidator
{

    private $invalidCpf = [
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999'
    ];

    public function isValid($value)
    {
        if (empty($value)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace('/[^0-9]/', '', (string) $value);

        if (strlen($cpf) > 11) {
            return false;
        }
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (in_array($cpf, $this->invalidCpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t ++) {
            for ($d = 0, $c = 0; $c < $t; $c ++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}
