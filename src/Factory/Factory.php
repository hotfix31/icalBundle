<?php

declare(strict_types=1);

namespace Welp\IcalBundle\Factory;

use Jsvrcek\ICS\Model\CalendarAlarm;
use Jsvrcek\ICS\Model\CalendarEvent;
use Jsvrcek\ICS\Model\CalendarFreeBusy;
use Jsvrcek\ICS\Model\CalendarTodo;
use Jsvrcek\ICS\Model\Description\Geo;
use Jsvrcek\ICS\Model\Description\Location;
use Jsvrcek\ICS\Model\Recurrence\RecurrenceRule;
use Jsvrcek\ICS\Model\Relationship\Attendee;
use Jsvrcek\ICS\Model\Relationship\Organizer;
use Jsvrcek\ICS\Utility\Formatter;
use Welp\IcalBundle\Component\Calendar;

/**
 * Calendar Factory.
 *
 * @author  Titouan BENOIT <titouan@welp.today>
 * @see \Welp\IcalBundle\Tests\Factory\FactoryTest
 */
class Factory
{
    private ?\DateTimeZone $timezone = null;
    private ?string $prodid = null;

    /**
     * Create new calendar.
     */
    public function createCalendar(): Calendar
    {
        $calendar = new Calendar();

        if (null !== $this->timezone) {
            $calendar->setTimezone($this->timezone);
        }

        if (null !== $this->prodid) {
            $calendar->setProdId($this->prodid);
        }

        return $calendar;
    }

    /**
     * Create new CalendarEvent.
     */
    public function createCalendarEvent(): CalendarEvent
    {
        return new CalendarEvent();
    }

    /**
     * Create new CalendarAlarm.
     */
    public function createCalendarAlarm(): CalendarAlarm
    {
        return new CalendarAlarm();
    }

    /**
     * Create new CalendarFreeBusy.
     */
    public function createCalendarFreeBusy(): CalendarFreeBusy
    {
        return new CalendarFreeBusy();
    }

    /**
     * Create new CalendarTodo.
     */
    public function createCalendarTodo(): CalendarTodo
    {
        return new CalendarTodo();
    }

    /**
     * Create new Attendee.
     */
    public function createAttendee(): Attendee
    {
        return new Attendee(new Formatter());
    }

    /**
     * Create new Organizer.
     */
    public function createOrganizer(): Organizer
    {
        return new Organizer(new Formatter());
    }

    /**
     * Create new Geo.
     */
    public function createGeo(): Geo
    {
        return new Geo();
    }

    /**
     * Create new Location.
     */
    public function createLocation(): Location
    {
        return new Location();
    }

    /**
     * Create new RecurrenceRule.
     */
    public function createRecurrenceRule(): RecurrenceRule
    {
        return new RecurrenceRule(new Formatter());
    }

    /**
     * Set default timezone for calendars.
     */
    public function setTimezone(string $timezone): void
    {
        $this->timezone = new \DateTimeZone($timezone);
    }

    /**
     * Set default prodid for calendars.
     */
    public function setProdid(string $prodid): void
    {
        $this->prodid = $prodid;
    }
}
