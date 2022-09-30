<?php

declare(strict_types=1);

namespace Welp\IcalBundle\Tests\Factory;

use Welp\IcalBundle\Factory\Factory;
use Welp\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for calendar factory.
 *
 * @author  Titouan BENOIT <titouan@welp.today>
 */
class FactoryTest extends CalendarTestCase
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * Set up tests.
     */
    protected function setUp(): void
    {
        $this->factory = new Factory();
    }

    /**
     * Test initiating factory.
     */
    public function testInit(): void
    {
        $this->assertInstanceOf('Welp\IcalBundle\Factory\Factory', $this->factory);
    }

    /**
     * Test creating new calendar.
     */
    public function testCreateCalendar(): void
    {
        $calendar = $this->factory->createCalendar();
        $this->assertCalendar($calendar);
    }

    /**
     * Test creating new calendarEvent.
     */
    public function testCreateCalendarEvent(): void
    {
        $calendarEvent = $this->factory->createCalendarEvent();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\CalendarEvent', $calendarEvent);
    }

    /**
     * Test creating new calendarAlarm.
     */
    public function testCreateCalendarAlarm(): void
    {
        $calendarAlarm = $this->factory->createCalendarAlarm();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\CalendarAlarm', $calendarAlarm);
    }

    /**
     * Test creating new calendarFreeBusy.
     */
    public function testCreateCalendarFreeBusy(): void
    {
        $calendarFreeBusy = $this->factory->createCalendarFreeBusy();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\CalendarFreeBusy', $calendarFreeBusy);
    }

    /**
     * Test creating new calendarTodo.
     */
    public function testCreateCalendarTodo(): void
    {
        $calendarTodo = $this->factory->createCalendarTodo();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\CalendarTodo', $calendarTodo);
    }

    /**
     * Test creating new Attendee.
     */
    public function testCreateAttendee(): void
    {
        $attendee = $this->factory->createAttendee();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\Relationship\Attendee', $attendee);
    }

    /**
     * Test creating new Organizer.
     */
    public function testCreateOrganizer(): void
    {
        $organizer = $this->factory->createOrganizer();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\Relationship\Organizer', $organizer);
    }

    /**
     * Test creating new Geo.
     */
    public function testCreateGeo(): void
    {
        $geo = $this->factory->createGeo();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\Description\Geo', $geo);
    }

    /**
     * Test creating new Location.
     */
    public function testCreateLocation(): void
    {
        $location = $this->factory->createLocation();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\Description\Location', $location);
    }

    /**
     * Test creating new RecurrenceRule.
     */
    public function testCreateRecurrenceRule(): void
    {
        $recurrenceRule = $this->factory->createRecurrenceRule();
        $this->assertInstanceOf('Jsvrcek\ICS\Model\Recurrence\RecurrenceRule', $recurrenceRule);
    }

    /**
     * Test timezone.
     */
    public function testTimezone(): void
    {
        $this->factory->setTimezone('Europe/Paris');
        $calendar = $this->factory->createCalendar();
        $this->assertCalendar($calendar);
        $this->assertInstanceOf('\DateTimeZone', $calendar->getTimezone());
        $this->assertSame('Europe/Paris', $calendar->getTimezone()->getName());
    }
}
