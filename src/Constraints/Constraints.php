<?php

declare(strict_types=1);

namespace ValueCore\Constraints;

final class Constraints
{
    private ?string $error;

    /**
     * @param array<callable(mixed $value): string> $constraints
     */
    public function __construct(
        private readonly array $constraints,
    ){
    }

    public function validate(mixed $value): ?string
    {
        if (! $this->wasValidated()) {
            $error = $this->checkConstraints($value);
            $this->setError($error);
        }

        return $this->error();
    }

    private function checkConstraints(mixed $value): ?string
    {
        foreach ($this->constraints as $constraint) {
            if ($error = $constraint($value)) {
                return $error;
            }
        }

        return null;
    }

    private function setError(?string $error): void
    {
        $this->error = $error;
    }

    private function error(): ?string
    {
        return $this->error;
    }

    private function wasValidated(): bool
    {
        return isset($this->error);
    }
}
