<?php

namespace egl\website\event;

class Event extends EventBuilder {
	
	protected $name;
	protected $description;
	protected $startDateTime;
	protected $endDateTime;

	public static function Builder() {
		return new EventBuilder();
	}

	public function __construct(EventBuilder $b) {
		$this->name = $b->name;
		$this->description = $b->description;
		$this->startDateTime = $b->startDateTime;
		$this->endDateTime = $b->endDateTime;
	}

	public function getName() {
		return $this->name;
	}

	public function getDescriptionAsHtml() {

	}
}