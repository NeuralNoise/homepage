<?php
namespace bsu\egl\homepage;

Install.main();

class Install {
	
	public static function main() {
		checkPrereqs();
	}
	
	private static function checkPrereqs() {
		try {
			checkConfigFileExists();
			checkMysqliPermissions();
			checkRewrite();
		} catch (PrerequisiteCheckFailedException $e) {
			println("The prerequisite check failed.");
			println($e->getMessage());
		}
	}
	
	private static function checkConfigFileExists() {
		// TODO: Implement check.
		throw new PrerequisiteCheckFailedException("Config file check not implemented.");
	}
	
	private static function checkMysqliPermissions() {
		// TODO: Implement check.
		throw new PrerequisiteCheckFailedException("MySQL checks not implemented.");
	}
	
	private static function checkRewrite() {
		// TODO: Implement check.
		throw new PrerequisiteCheckFailedException("Rewrite checks not implemented.");
	}
	
	public static function println($line) {
		echo "<p>$line</p>";
	}
}

class PrerequisiteCheckFailedException extends Exception {}