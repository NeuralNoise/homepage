<?php

namespace egl\website\tests;

class TestEvent extends \PHPUnit_Framework_TestCase {
	
	private $event;

	/**
	 * @before
	 */
	public function createExampleEvent() {
		$this->event = \egl\website\event\Event::Builder()->withName("Hello!")
			->withDescription("Example event")
			->withStartDateTime(new \DateTime('2015-01-01 15:00:00'))
			->withEndDateTime(new \DateTime('2015-01-01 17:00:00'))
			->build();
	}

	public function testEventIsHello() {
		$this->assertEquals("Hello!", $this->event->getName());
	}

	public function testEventIsExampleEvent() {

	}

}