<?php

declare(strict_types=1);

namespace Folyod\ValueCore;

use Folyod\ValueCore\Exceptions\InvalidValueException;
use Folyod\ValueCore\State\ValueState;

abstract readonly class Value
{
    private ValueState $state;

    public function __construct(mixed $value)
    {
        $this->state = new ValueState($value);
    }

    /**
     * @throws InvalidValueException
     */
    public function value(): mixed
    {
        return $this->state->value();
    }

    /**
     * @throws InvalidValueException
     */
    public function equal(Value $value): bool
    {
        return $this->value() === $value->value();
    }
}
