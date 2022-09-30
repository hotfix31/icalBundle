<?php

declare(strict_types=1);

namespace Welp\IcalBundle\Response;

use Symfony\Component\HttpFoundation\Response;
use Welp\IcalBundle\Component\Calendar;

/**
 * Represents a HTTP response for a calendar file download.
 *
 * @author  Titouan BENOIT <titouan@welp.today>
 * @see \Welp\IcalBundle\Tests\Response\CalendarResponseTest
 */
class CalendarResponse extends Response
{
    /**
     * Construct calendar response.
     *
     * @param Calendar              $calendar Calendar
     * @param int                   $status   Response status
     * @param array<string, string> $headers  Response headers
     */
    public function __construct(protected Calendar $calendar, int $status = 200, array $headers = [])
    {
        $content = $this->calendar->export();

        $headers = [...$this->getDefaultHeaders(), ...$headers];
        parent::__construct($content, $status, $headers);
    }

    /**
     * Get default response headers for a calendar.
     *
     * @return array<string, string>
     */
    protected function getDefaultHeaders(): array
    {
        $headers = [];

        $mimeType = $this->calendar->getContentType();
        $headers['Content-Type'] = sprintf('%s; charset=utf-8', $mimeType);

        $filename = $this->calendar->getFilename();
        $headers['Content-Disposition'] = sprintf('attachment; filename="%s', $filename);

        return $headers;
    }
}
