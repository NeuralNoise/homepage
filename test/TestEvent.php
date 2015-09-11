<?php
namespace egl\website\tests;

class TestEvent extends PHPUnit_Framework_TestCase {
	
	private $event;
	
	/**
	 * @before
	 */
	public function createExampleEvent() {
		$this->event = \egl\website\event\Event::Builder()->//
			withName("Example event")->//
			withDescription("<p>Event with an HTML description</p>")->//
			withStartDateTime(new \DateTime('2015-01-01 15:00:00'))->//
			withEndDateTime(new \DateTime('2015-01-01 17:00:00'))->//
			build();
	}
	
	public function testEventInJanuary() {
		$this->assertEquals(1, getMonth($this->event));
	}
	
	private function getMonth() {
		$dt = $this->event->getDateTime();
		return intval($dt->format('m'));
	}
	
}