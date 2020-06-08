<?php

namespace homework;

define('JAN', 1);
define('FEB', 2);
define('MAR', 3);
define('APR', 4);
define('MAY', 5);
define('JUN', 6);
define('JUL', 7);
define('AUG', 8);
define('SEP', 9);
define('OCT', 10);
define('NOV', '11');
define('DEC', '12');


class FindNextDay
{
    protected $day;
    protected $month;
    protected $year;

    public function getTheNextDay($day, $month, $year)
    {
        if (self::isEndOfMonth($day, $month, $year)) {
            $result = 1;
        } else {
            $result = $day + 1;
        }
        return $result;
    }

    public function isLeapYear($year)
    {
        if (self::isDivisible100($year)) {
            if (self::isDivisible400($year)) {
                return true;
            } else {
                return false;
            }
        } elseif (self::isDivisible4($year)) {
            return true;
        } else {
            return false;
        }
    }

    public function isDivisible4($year)
    {
        return ($year % 4 == 0);
    }

    public function isDivisible100($year)
    {
        return ($year % 100 == 0);
    }

    public function isDivisible400($year)
    {
        return ($year % 400 == 0);
    }

    public function checkDayOfMonth($month, $year)
    {
        switch ($month) {
            case JAN:
            case MAR:
            case MAY:
            case JUL:
            case AUG:
            case OCT:
            case DEC:
                return 31;
            case APR:
            case JUN:
            case SEP:
            case NOV:
                return 30;
            case FEB:
                if (self::isLeapYear($year)) {
                    return 29;
                } else {
                    return 28;
                }
        }
    }

    public function isEndOfMonth($day, $month, $year)
    {
        if (self::checkDayOfMonth($month, $year) == $day) {
            return true;
        }
        return false;
    }
}
