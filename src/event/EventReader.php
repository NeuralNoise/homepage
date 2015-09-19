<?php
namespace egl\website\event;

abstract class EventReader implements \egl\website\Reader {
	public abstract function setIdFilter($id);
	public abstract function search($search, $field = '');
	
}