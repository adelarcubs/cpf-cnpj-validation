<?php
namespace CpfCnpjValidation;

use Zend\Validator\ValidatorInterface;

class Cpf implements ValidatorInterface
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

    /**
     * Returns true if and only if $value meets the validation requirements
     *
     * If $value fails validation, then this method returns false, and
     * getMessages() will return an array of messages that explain why the
     * validation failed.
     *
     * @param mixed $value            
     * @return bool
     * @throws Exception\RuntimeException If validation of $value is impossible
     */
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

    /**
     * Returns an array of messages that explain why the most recent isValid()
     * call returned false.
     * The array keys are validation failure message identifiers,
     * and the array values are the corresponding human-readable message strings.
     *
     * If isValid() was never called or if the most recent isValid() call
     * returned true, then this method returns an empty array.
     *
     * @return array
     */
    public function getMessages()
    {
        return [];
    }
}