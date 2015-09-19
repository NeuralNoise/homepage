<?php
namespace egl\website\test\event;

use egl\website\event\Event;
use egl\website\test\event\StaticEventReader;

class TestEvent extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @before
	 */
	public function initialize() {
		Event::setReader('egl\website\test\event\StaticEventReader');
	}
	
	/**
	 * @test
	 */
	public function testEventName() {
		$event = Event::fromID(1);
		$this->assertEquals($event->getName(), 'First event ever');
	}
}