<?php

/*
 * This file is part of the Phospr MonthYear package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phospr\Tests;

use DateTime;
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
     * Test fromMonthAndYear
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     */
    public function testFromMonthAndYear()
    {
        $monthYear = MonthYear::fromMonthAndYear(10, 1976);

        $this->assertSame(10, $monthYear->getMonth());
        $this->assertSame(1976, $monthYear->getYear());
    }

    /**
     * Test fromDateTime
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     */
    public function testFromDateTime()
    {
        $dateTime = new DateTime();

        $monthYear = MonthYear::fromDateTime($dateTime);

        $this->assertSame((int) $dateTime->format('n'), $monthYear->getMonth());
        $this->assertSame((int) $dateTime->format('Y'), $monthYear->getYear());
    }

    /**
     * Test equals
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     */
    public function testEquals()
    {
        $monthYear = MonthYear::fromMonthAndYear(10, 2015);
        $other = MonthYear::fromMonthAndYear(10, 2015);

        $this->assertTrue($monthYear->equals($other));
    }

    /**
     * Test isSameValueAs()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     */
    public function testIsSameValueAs()
    {
        $monthYear = MonthYear::fromMonthAndYear(10, 2015);
        $other = MonthYear::fromMonthAndYear(10, 2015);

        $this->assertTrue($monthYear->isSameValueAs($other));
    }

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
     * Test __toString()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     */
    public function testToString()
    {
        $monthYear = MonthYear::fromMonthAndYear(1,2017);

        $this->assertSame('2017-01', (string) $monthYear);
    }

    /**
     * Test getFirstOfMonth()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @dataProvider getFirstOfMonthProvider
     */
    public function testGetFirstOfMonth(MonthYear $monthYear, $dateString)
    {
        $this->assertSame(
            $dateString,
            $monthYear->getFirstOfMonth()->format('Y-m-d')
        );
    }

    /**
     * Test getQuarter()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @dataProvider getQuarterProvider
     */
    public function testGetQuarter($month, $year, $quarter)
    {
        $this->assertSame(
            $quarter,
            MonthYear::fromMonthAndYear($month, $year)->getQuarter()
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

    /**
     * getFirstOfMonth provider
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @return array
     */
    public static function getFirstOfMonthProvider()
    {
        return [
            [MonthYear::fromMonthAndYear(2,2016), '2016-02-01'],
            [MonthYear::fromMonthAndYear(12,2016), '2016-12-01'],
            [MonthYear::fromDateTime(new DateTime('2015-10-04')), '2015-10-01'],
        ];
    }

    /**
     * getQuarter provider
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @return array
     */
    public static function getQuarterProvider()
    {
        return [
            [1, 2016, 1],
            [2, 2016, 1],
            [3, 2016, 1],
            [4, 2016, 2],
            [5, 2016, 2],
            [6, 2016, 2],
            [7, 2016, 3],
            [8, 2016, 3],
            [9, 2016, 3],
            [10, 2016, 4],
            [11, 2016, 4],
            [12, 2016, 4],
            [1, 2019, 1],
            [2, 2012, 1],
            [3, 2009, 1],
            [4, 1947, 2],
            [5, 1921, 2],
            [6, 2032, 2],
            [7, 2053, 3],
            [8, 2062, 3],
            [9, 2048, 3],
            [10, 2021, 4],
            [11, 2052, 4],
            [12, 2048, 4],
        ];
    }
}
