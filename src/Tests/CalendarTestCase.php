<?php

declare(strict_types=1);

namespace Welp\IcalBundle\Tests;

use PHPUnit\Framework\TestCase;
use Welp\IcalBundle\Component\Calendar;

/**
 * @author  Titouan BENOIT <titouan@welp.today>
 */
abstract class CalendarTestCase extends TestCase
{
    /**
     * Assert calendar configs.
     */
    protected function assertCalendar(mixed $calendar): void
    {
        $this->assertInstanceOf(Calendar::class, $calendar);
        $this->assertInstanceOf(\Jsvrcek\ICS\Model\Calendar::class, $calendar);
    }
}
