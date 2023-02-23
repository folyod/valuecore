<?php

declare(strict_types=1);

namespace Test;

use ArgumentCountError;
use Exception;
use PHPUnit\Framework\TestCase;
use Test\Values\SomeValue;
use Test\Values\ValueWithValidation;
use Test\Values\ValueWithWrongConstraintCallback;

final class ValueTest extends TestCase
{
    public function testCreateValue(): void
    {
        $value = 'something';
        $vo = new SomeValue($value);
        $this->assertSame($value, $vo->value());
    }

    /**
     * @dataProvider validateValueDataProvider
     */
    public function testValidateValue(string|int $value, ?string $expectedError): void
    {
        $value = 'correct';
        $vo = new ValueWithValidation($value);
        $this->assertSame($value, $vo->value());
    }

    public static function validateValueDataProvider(): array
    {
        return [
            ['correct', null],
            ['incorrect', 'is not correct email'],
            [5, 'is no a string']
        ];
    }
}
