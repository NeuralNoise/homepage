<?php

namespace egl\website\event;

class EventBuilder implements \egl\website\Builder {
	
	public $name;
	public $description;
	public $startDateTime;
	public $endDateTime;

	public function __construct() {}

	/**
	 * The name of the event.
	 */
	public function withName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * The description of the event, in Markdown. Also supports HTML.
	 */
	public function withDescription($description) {
		$this->description = $description;
		return $this;
	}

	public function withStartDateTime(\DateTime $datetime) {
		$this->startDateTime = $datetime;
		return $this;
	}

	public function withEndDateTime(\DateTime $datetime) {
		$this->endDateTime = $datetime;
		return $this;
	}

	public function build() {
		return new Event($this);
	}

}