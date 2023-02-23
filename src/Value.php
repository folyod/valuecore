<?php

declare(strict_types=1);

namespace ValueCore;

use ValueCore\Constraints\Constraints;
use ValueCore\Exceptions\InvalidValueException;

abstract readonly class Value
{
    private Constraints $constraints;

    public function __construct(
        private mixed $value,
    ) {
        $this->constraints = new Constraints($this->constraints());
    }

    /**
     * @throws InvalidValueException
     */
    public function value(): mixed
    {
        if ($error = $this->validate()) {
            throw new InvalidValueException($error);
        }

        return $this->value;
    }

    /**
     * @throws InvalidValueException
     */
    public function equal(Value $value): bool
    {
        return $this->value() === $value->value()
            && static::class === $value::class;
    }

    public function validate(): ?string
    {
        return $this->constraints->validate($this->value);
    }

    /**
     * @return array<callable(mixed $value): string>
     */
    protected function constraints(): array
    {
        return [];
    }
}
