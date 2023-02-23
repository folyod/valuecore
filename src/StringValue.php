<?php

declare(strict_types=1);

namespace ValueCore;

use ValueCore\Exceptions\InvalidValueException;
use ValueCore\Exceptions\UnexpectStateException;
use Stringable;

abstract readonly class StringValue extends Value implements Stringable
{
    /**
     * @throws InvalidValueException
     * @throws UnexpectStateException
     */
    public function value(): string
    {
        $value = parent::value();
        if (! is_string($value)) {
            throw new UnexpectStateException(sprintf(
                'The value must be a string, %s given',
                gettype($value)
            ));
        }

        return $value;
    }

    /**
     * @throws InvalidValueException
     * @throws UnexpectStateException
     */
    public function __toString(): string
    {
        return $this->value();
    }
}
