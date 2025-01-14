<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see     https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since   1.1.0
 */

namespace Idm\Bundle\Common\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use function is_numeric;

/**
 * Check if the value is odd.
 */
class IsOddValidator extends ConstraintValidator
{
    public function validate ($value, Constraint $constraint): void
    {
        if (!$constraint instanceof IsOdd) {
            throw new UnexpectedTypeException($constraint, IsOdd::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_numeric($value)) {
            //-- Must be an integer or decimal value
            throw new UnexpectedValueException($value, 'int|float');
        }

        //-- Check if number is odd, if is even adding a violation
        if ($value % 2 == 0) {
            $this->context
                ->buildViolation($constraint->message)->setParameter('{{ number }}', $value)->addViolation()
            ;
        }
    }
}
