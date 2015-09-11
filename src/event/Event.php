<?php
namespace egl\website\event;

class Event {
	
	public static function Builder() {
		return new Builder;
	}
	
	public function getDateTime() {
		return null;
	}
}

class Builder implements \egl\website\Builder {
	
}