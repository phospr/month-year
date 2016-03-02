<?php

/*
 * This file is part of the Phospr MonthYear package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phospr;

use \DateTime;

/**
 * MonthYear
 *
 * A representation of a Month-Year pair, e.g. November 2015, October 1976, etc
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  1.0.0
 */
class MonthYear
{
    /**
     * month
     *
     * @var int
     */
    private $month;

    /**
     * year
     *
     * @var int
     */
    private $year;

    /**
     * Construct
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     */
    private function __construct() {}

    /**
     * __toString
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '%s-%02d',
            $this->getYear(),
            $this->getMonth()
        );
    }

    /**
     * Create MonthYear given month and year
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @param int $month
     * @param int $year
     *
     * @return MonthYear
     */
    public static function fromMonthAndYear($month, $year)
    {
        $monthYear = new MonthYear();
        $monthYear->month = (int) $month;
        $monthYear->year = (int) $year;

        return $monthYear;
    }

    /**
     * Create MonthYear from DateTime
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @param DateTime $dateTime
     *
     * @return MonthYear
     */
    public static function fromDateTime(DateTime $dateTime)
    {
        $monthYear = new MonthYear();
        $monthYear->month = (int) $dateTime->format('n');
        $monthYear->year = (int) $dateTime->format('Y');

        return $monthYear;
    }

    /**
     * Get month
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Get year
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Get first of month
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @return DateTime
     */
    public function getFirstOfMonth()
    {
        return new DateTime(sprintf(
            '%s-%s-01',
            $this->getYear(),
            round($this->getMonth(), 2)
        ));
    }

    /**
     * Whether the given MonthYear is considered equal to this one
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @param MonthYear $monthYear
     *
     * @return bool
     */
    public function equals(MonthYear $other)
    {
        return $this->isSameValueAs($other);
    }

    /**
     * Whether the given MonthYear is considered equal to this one
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @param MonthYear $monthYear
     *
     * @return bool
     */
    public function isSameValueAs(MonthYear $other)
    {
        return
            $this->getYear() == $other->getYear() &&
            $this->getMonth() == $other->getMonth();
    }

    /**
     * Whether this MonthYear is greater than the given one
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  1.0.0
     *
     * @param MonthYear $monthYear
     *
     * @return bool
     */
    public function greaterThan(MonthYear $other)
    {
        return
            $this->getYear() > $other->getYear() ||

            $this->getYear() == $other->getYear() &&
            $this->getMonth() > $other->getMonth()
        ;
    }
}
