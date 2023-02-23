<?php

declare(strict_types=1);

namespace Test\Values;

use ValueCore\Value;

final readonly class ValueWithValidation extends Value
{
    public function constraints(): array
    {
        return [
            ...parent::constraints(),
            $this->testConstraintByCallback(),
            $this->testConstraintByInvokeable(),
        ];
    }

    private function testConstraintByCallback(): callable
    {
        return function (mixed $value): ?string {
            if (! is_string($value)) {
                return 'value is not a string';
            }

            return null;
        };
    }

    private function testConstraintByInvokeable(): callable
    {
        return new class {
            public function __invoke(mixed $value): ?string
            {
                if ($value !== 'correct') {
                    return 'value is not correct';
                }

                return null;
            }
        };
    }
}
