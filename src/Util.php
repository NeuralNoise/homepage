<?php

class Util {

	public static function assertInteger($object) {
		if ($object + 0 === $object) {
			return;
		} else {
			throw new InvalidArgumentException("Expected an integer, but recieved type " . get_class($object));
		}
	}
}