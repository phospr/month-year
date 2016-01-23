<?php

/*
 * This file is part of the Phospr MonthYear package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phospr\Tests;

use Phospr\MonthYear;

/**
 * MonthYearTest
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  1.0.0
 */
class MonthYearTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test greaterThan()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @dataProvider greaterThanProvider
     */
    public function testGreaterThan(
        $month,
        $year,
        $otherMonth,
        $otherYear,
        $greaterThanOther
    ) {
        $monthYear = MonthYear::fromMonthAndYear($month, $year);
        $otherMonthYear = MonthYear::fromMonthAndYear($otherMonth, $otherYear);

        $this->assertSame(
            $greaterThanOther,
            $monthYear->greaterThan($otherMonthYear)
        );
    }

    /**
     * greaterThan provider
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @return array
     */
    public static function greaterThanProvider()
    {
        return [
            [2, 2015, 1, 2015, true],
            [10, 2015, 2, 2015, true],
            [1, 2016, 12, 2015, true],
            [2, 2015, 2, 2015, false],
            [1, 2015, 2, 2015, false],
            [1, 2015, 10, 2015, false],
        ];
    }
}
