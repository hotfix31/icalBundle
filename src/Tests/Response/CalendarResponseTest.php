<?php

declare(strict_types=1);

namespace Welp\IcalBundle\Tests\Response;

use Welp\IcalBundle\Component\Calendar;
use Welp\IcalBundle\Response\CalendarResponse;
use Welp\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for CalendarResponse.
 *
 * @author  Titouan BENOIT <titouan@welp.today>
 */
class CalendarResponseTest extends CalendarTestCase
{
    /**
     * Testing calendar response.
     */
    public function testCalendarResponse(): void
    {
        $calendar = new Calendar();
        $response = new CalendarResponse($calendar, \Symfony\Component\HttpFoundation\Response::HTTP_OK);

        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
        $this->assertInstanceOf('Welp\IcalBundle\Response\CalendarResponse', $response);
        $this->assertEquals(\Symfony\Component\HttpFoundation\Response::HTTP_OK, $response->getStatusCode());

        $this->assertSame($calendar->export(), $response->getContent());

        $this->assertContains($calendar->getContentType() . '; charset=utf-8', $response->headers->get('Content-Type'));
        $this->assertContains($calendar->getFilename(), $response->headers->get('Content-Disposition'));
    }
}
