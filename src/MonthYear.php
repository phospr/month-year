<?php

/*
 * This file is part of the Phospr MonthYear package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Phospr;

/**
 * MonthYear
 *
 * A representation of a Month-Year pair, e.g. November 2015, October 1976, etc
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.1.0
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
     * @since  0.1.0
     */
    private function __construct() {}

    /**
     * Create MonthYear given month and year
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.1.0
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
     * Get month
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.1.0
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
     * @since  0.1.0
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }
}
