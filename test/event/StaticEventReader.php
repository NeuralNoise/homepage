<?php

namespace egl\website\test\event;

use Carbon\Carbon;
use egl\website\event\Event;
use egl\website\event\EventReader;

class StaticEventReader extends EventReader {
	
	private static $tz = 'America/New_York'; // TODO: Websitewide Constants?
	private $eventList;
	private $readEvents;
	
	private $idFilter; // TODO: Is there a way to do this through an object that is efficient?
	private $hasBeenRead = false;

	public function __construct() {
		$tz = StaticEventReader::$tz;
		// New objects cannot be created in default field values.
		$this->eventList = array(
				1 => [
						Event::ID => 1,
						Event::NAME => 'First event ever',
						Event::DESCRIPTION => '**EVENTS EVERYWHERE**',
						Event::START_DATE_TIME => Carbon::create(2015, 01, 01, 12, 00, 00, $tz),
						Event::END_DATE_TIME => Carbon::create(2015, 01, 01, 14, 00, 00, $tz)
				],
				2 => [
						Event::ID => 2,
						Event::NAME => 'Another event',
						Event::DESCRIPTION => 'This is an event with a *longer* description.  Though not that long.',
						Event::START_DATE_TIME => Carbon::create(2015, 01, 03, 17, 00, 00, $tz),
						EVENT::END_DATE_TIME => Carbon::create(2015, 01, 03, 21, 00, 00, $tz)
				]
		);
	}

	public function read() {
		$this->readEvents = [
				$this->eventList[1]
		];
	}

	public function getNext() {
		$eventArray = current($this->readEvents);
		next($this->readEvents); // TODO: What is the best way to do this?
		return $this->makeEventObject($eventArray);
	}

	public function getAll() {
		reset($this->readEvents);
		$allEvents = [];
		array_push($allEvents, $this->makeEventObject($eventArray));
		while($eventArray = next($this->readEvents))
			array_push($allEvents, $this->makeEventObject($eventArray));
		return $allEvents;
	}

	private function makeEventObject($eventArray) {
		return Event::Builder()->withName($eventArray[Event::NAME])
			->withDescription($eventArray[Event::DESCRIPTION])
			->withStartDateTime($eventArray[Event::START_DATE_TIME])
			->withEndDateTime($eventArray[Event::END_DATE_TIME])
			->build();
	}

	public function hasNext() {
		// Is this seriously the only way to do this?
		if (current($this->readEvents) !== false) {
			return true;
		}
		return false;
	}

	public function setIdFilter($id) {
		$this->idFilter = $id;
	}

	public function search($search, $field = '') {

	}

}