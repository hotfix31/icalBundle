<?php

declare(strict_types=1);

namespace Welp\IcalBundle\Tests\Component;

use Welp\IcalBundle\Component\Calendar;
use Welp\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for calendar component.
 *
 * @author  Titouan BENOIT <titouan@welp.today>
 */
class CalendarTest extends CalendarTestCase
{
    /**
     * Testing initiating calendar.
     */
    public function testInit(): void
    {
        $calendar = new Calendar();
        $this->assertCalendar($calendar);
    }

    /**
     * Testing filename calendar.
     */
    public function testSetGetFilename(): void
    {
        $calendar = new Calendar();
        $this->assertSame('calendar.ics', $calendar->getFilename());

        $calendar->setFilename('test.ics');
        $this->assertSame('test.ics', $calendar->getFilename());
    }

    /**
     * Testing contentType calendar.
     */
    public function testGetContentType(): void
    {
        $calendar = new Calendar();
        $this->assertSame('text/calendar', $calendar->getContentType());
    }

    /**
     * Testing export calendar.
     */
    public function testExport(): void
    {
        $calendar = new Calendar();
        $this->assertStringStartsWith('BEGIN:VCALENDAR', $calendar->export());
    }
}
