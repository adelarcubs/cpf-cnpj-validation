<?php
declare(strict_types = 1);
namespace CpfCnpjValidation;

use Zend\Validator\AbstractValidator;

class Cnpj extends AbstractValidator
{

    public function isValid($value)
    {
        if (empty($value)) {
            return false;
        }
        $cnpj = preg_replace('/[^0-9]/', '', (string) $value);
        // Valida tamanho
        if (strlen($cnpj) > 14) {
            return false;
        }
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i ++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i ++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
}
