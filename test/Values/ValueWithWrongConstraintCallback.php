<?php

declare(strict_types=1);

namespace Test\Values;

use ValueCore\Value;

final readonly class ValueWithWrongConstraintCallback extends Value
{
    public function constraints(): array
    {
        return [
            ...parent::constraints(),
            $this->testWrongCallbackInterface(),
        ];
    }

    private function testWrongCallbackInterface(): callable
    {
        return function (): void {
        };
    }
}
