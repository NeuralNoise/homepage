<?php

namespace egl\website\event;

use egl\website\Util;

class Event {
	
	const ID = 'id';
	const NAME = 'name';
	const DESCRIPTION = 'description';
	const START_DATE_TIME = 'startDateTime';
	const END_DATE_TIME = 'endDateTime';
	const DEFAULT_READER = "egl\website\event\SqlEventReader";
	
	private $id;
	private $name;
	private $description;
	private $startDateTime;
	private $endDateTime;
	
	private static $reader;

	public static function Builder() {
		return new EventBuilder();
	}
	
	public static function fromID($id) {
		$eventReader = new Event::$reader();
		$eventReader->setIdFilter($id);
		$eventReader->read();
		if ($eventReader->hasNext()) {
			return $eventReader->getNext();
		}
		throw new EventNotFoundException();
	}

	public function __construct(EventBuilder $b) {
		$this->name = $b->name;
		$this->description = $b->description;
		$this->startDateTime = $b->startDateTime;
		$this->endDateTime = $b->endDateTime;
	}

	public static function setReader($readerName) {
		if (Event::isNameOfEventReader($readerName)) {
			Event::$reader = $readerName;
		} else {
			throw new \InvalidArgumentException("Expected the name of an EventReader class, got $readerName instead.");
		}
	}
	
	private static function isNameOfEventReader($name) {
		return is_a($name, 'egl\website\event\EventReader', true);
	}

	public function getName() {
		return $this->name;
	}

	public function getDescriptionAsHtml() {
		return "Example event";
	}
}