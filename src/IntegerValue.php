<?php

declare(strict_types=1);

namespace ValueCore;

use ValueCore\Contracts\Intable;
use ValueCore\Exceptions\InvalidValueException;
use ValueCore\Exceptions\UnexpectStateException;

abstract readonly class IntegerValue extends Value implements Intable
{
    /**
     * @throws InvalidValueException
     * @throws UnexpectStateException
     */
    public function value(): int
    {
        $value = parent::value();
        if (! is_int($value)) {
            throw new UnexpectStateException(sprintf(
                'The value must be an integer, %s given',
                gettype($value)
            ));
        }

        return $value;
    }

    /**
     * @throws InvalidValueException
     * @throws UnexpectStateException
     */
    public function toInteger(): int
    {
        return $this->value();
    }
}
