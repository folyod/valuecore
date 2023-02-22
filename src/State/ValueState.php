<?php

declare(strict_types=1);

namespace Folyod\ValueCore\State;

use Folyod\ValueCore\Exceptions\InvalidValueException;

final class ValueState
{
    private string $error = '';

    public function __construct(
        private readonly mixed $value
    ) {
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

    public function validate(): string
    {
        if (! $this->wasValidated()) {
            // валидация
            $error = ""; // fixme заглушка
            $this->setError($error);
        }

        return $this->error();
    }

    private function setError(string $error): void
    {
        $this->error = $error;
    }

    private function error(): string
    {
        return $this->error;
    }

    private function wasValidated(): bool
    {
        return empty($this->error());
    }
}
