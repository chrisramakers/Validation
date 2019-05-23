<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Respect\Validation\Test\RuleTestCase;
use const PHP_INT_MAX;

/**
 * @group rule
 *
 * @covers \Respect\Validation\Rules\FloatType
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Reginaldo Junior <76regi@gmail.com>
 */
final class FloatTypeTest extends RuleTestCase
{
    /**
     * {@inheritDoc}
     */
    public function providerForValidInput(): array
    {
        $rule = new FloatType();

        return [
            [$rule, 165.23],
            [$rule, 1.3e3],
            [$rule, 7E-10],
            [$rule, 0.0],
            [$rule, -2.44],
            [$rule, 10 / 33.33],
            [$rule, PHP_INT_MAX + 1],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function providerForInvalidInput(): array
    {
        $rule = new FloatType();

        return [
            [$rule, '1'],
            [$rule, '1.0'],
            [$rule, '7E-10'],
            [$rule, 111111],
            [$rule, PHP_INT_MAX * -1],
        ];
    }
}
