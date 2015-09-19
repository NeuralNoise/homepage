<?php
namespace egl\website;

interface Reader {
	public function read();
	public function getNext();
	public function getAll();
	public function hasNext();
}