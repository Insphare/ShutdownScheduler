<?php

function wrapperCall($a, $b) {
	echo 'Wrapper: ' . $a . '+' . $b;
}

class TestClass {

	public function __construct($c, $d) {
		$this->c = $c;
		$this->d = $d;
	}

	public function instanceCall($a, $b) {
		echo 'Instance-Call: ' . $a . '+' . $b . '+' . $this->c . '+' . $this->d;
	}

	public static function staticCall($a, $b) {
		echo 'Static-Call: ' . $a . '+' . $b;
	}
}

$a = '0';
$b = '1';
$c = '2';
$d = '3';

ShutdownScheduler::getInstance()->registerClass('TestClass', 'instanceCall', array($a, $b), array($c, $d));
ShutdownScheduler::getInstance()->registerStaticClass('TestClass', 'staticCall', array($a, $b));
ShutdownScheduler::getInstance()->registerWrapper('wrapperCall', array($a, $b));
ShutdownScheduler::getInstance()->registerWrapper('session_write_close');