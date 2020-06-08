<?php

use homework\FindNextDay;
use PHPUnit\Framework\TestCase;

include_once "FindNextDay.php";

class FindNextDayTest extends TestCase
{
    public function testIsDivisible4()
    {
        $year = 20;

        $this->assertTrue(FindNextDay::isDivisible4($year));
    }

    public function testIsNotDivisible4()
    {
        $year = 22;

        $this->assertNotTrue(FindNextDay::isDivisible4($year));
    }

    public function testIsDivisible100()
    {
        $year = 200;

        $this->assertTrue(FindNextDay::isDivisible100($year));
    }

    public function testIsNotDivisible100()
    {
        $year = 2001;

        $this->assertNotTrue(FindNextDay::isDivisible100($year));
    }

    public function testIsDivisible400()
    {
        $year = 800;

        $this->assertTrue(FindNextDay::isDivisible400($year));
    }

    public function testIsNotDivisible400()
    {
        $year = 2003;

        $this->assertNotTrue(FindNextDay::isDivisible400($year));
    }

    public function testIsDivisible100and400()
    {
        $year = 2000;

        $this->assertTrue(FindNextDay::isDivisible100($year) && FindNextDay::isDivisible400($year));
    }

    public function testIsDivisible100ButNot400()
    {
        $year = 1900;

        $this->assertFalse(FindNextDay::isDivisible100($year) && FindNextDay::isDivisible400($year));
    }

    public function testIs1996LeapYear()
    {
        $year = 1996;

        $this->assertTrue(FindNextDay::isLeapYear($year));
    }

    public function testIs1900LeapYear()
    {
        $year = 1900;

        $this->assertFalse(FindNextDay::isLeapYear($year));
    }

    public function testIs2000LeapYear()
    {
        $year = 2000;

        $this->assertTrue(FindNextDay::isLeapYear($year));
    }

    public function testIsFeb2000Have29Days()
    {
        $year = 2000;
        $month = 2;

        $expected = 29;
        $actual = FindNextDay::checkDayOfMonth($month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testIsAug2000Have31Days()
    {
        $year = 2000;
        $month = 8;

        $expected = 31;
        $actual = FindNextDay::checkDayOfMonth($month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testIsSep2000Have30Days()
    {
        $year = 2000;
        $month = 9;

        $expected = 30;
        $actual = FindNextDay::checkDayOfMonth($month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testIsFeb1999Have28Days()
    {
        $year = 1999;
        $month = 2;

        $expected = 28;
        $actual = FindNextDay::checkDayOfMonth($month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testIsMar1999Have31Days()
    {
        $year = 1999;
        $month = 3;

        $expected = 31;
        $actual = FindNextDay::checkDayOfMonth($month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testIsApr1999Have30Days()
    {
        $year = 1999;
        $month = 4;

        $expected = 30;
        $actual = FindNextDay::checkDayOfMonth($month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testIs29EndOfMonthFeb2000()
    {
        $day = 29;
        $month = 2;
        $year = 2000;

        $this->assertTrue(FindNextDay::isEndOfMonth($day,$month,$year));
    }

    public function testIs28EndOfMonthFeb1998()
    {
        $day = 28;
        $month = 2;
        $year = 1998;

        $this->assertTrue(FindNextDay::isEndOfMonth($day,$month,$year));
    }

    public function testIs31EndOfMonthMar1998()
    {
        $day = 31;
        $month = 3;
        $year = 1998;

        $this->assertTrue(FindNextDay::isEndOfMonth($day,$month,$year));
    }

    public function testIs30EndOfMonthApr1998()
    {
        $day = 30;
        $month = 4;
        $year = 1998;

        $this->assertTrue(FindNextDay::isEndOfMonth($day,$month,$year));
    }

    public function testFindTheNextDay27Feb2000()
    {
        $day = 27;
        $month = 2;
        $year = 2000;
        $expected = 28;

        $actual = FindNextDay::getTheNextDay($day, $month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testFindTheNextDay28Feb2000()
    {
        $day = 28;
        $month = 2;
        $year = 2000;
        $expected = 29;

        $actual = FindNextDay::getTheNextDay($day, $month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testFindTheNextDay29Feb2000()
    {
        $day = 29;
        $month = 2;
        $year = 2000;
        $expected = 1;

        $actual = FindNextDay::getTheNextDay($day, $month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testFindTheNextDay29Mar2000()
    {
        $day = 29;
        $month = 3;
        $year = 2000;
        $expected = 30;

        $actual = FindNextDay::getTheNextDay($day, $month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testFindTheNextDay30Mar2000()
    {
        $day = 30;
        $month = 3;
        $year = 2000;
        $expected = 31;

        $actual = FindNextDay::getTheNextDay($day, $month, $year);

        $this->assertEquals($expected, $actual);
    }

    public function testFindTheNextDay31Mar2000()
    {
        $day = 31;
        $month = 3;
        $year = 2000;
        $expected = 1;

        $actual = FindNextDay::getTheNextDay($day, $month, $year);

        $this->assertEquals($expected, $actual);
    }
}
