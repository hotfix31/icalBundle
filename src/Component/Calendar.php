<?php

declare(strict_types=1);

namespace Welp\IcalBundle\Component;

use Jsvrcek\ICS\CalendarExport;
use Jsvrcek\ICS\CalendarStream;
use Jsvrcek\ICS\Model\Calendar as vCalendar;
use Jsvrcek\ICS\Utility\Formatter;

/**
 * Calendar component.
 *
 * @author  Titouan BENOIT <titouan@welp.today>
 * @see \Welp\IcalBundle\Tests\Component\CalendarTest
 */
class Calendar extends vCalendar
{
    private string $filename = 'calendar.ics';

    public function getContentType(): string
    {
        return 'text/calendar';
    }

    /**
     * @return string .ics formatted text
     */
    public function export($doImmediateOutput = false): string
    {
        // setup exporter
        $calendarExport = new CalendarExport(new CalendarStream(), new Formatter());
        $calendarExport->addCalendar($this);

        // set exporter to send items directly to output instead of storing in memory
        $calendarExport->getStreamObject()->setDoImmediateOutput($doImmediateOutput);

        // output .ics formatted text
        return $calendarExport->getStream();
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }
}
