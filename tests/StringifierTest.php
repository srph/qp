<?php

use Qp\Stringifier;

class StringifierTest extends PHPUnit_Framework_TestCase {
	public function testShouldStringify() {
		$query = ['name' => 'john'];
		$stringifier = new Stringifier($query);
		$string = $stringifier->stringify();
		$this->assertEquals($string, 'name=john');
	}

	public function testShouldConcatenateQueryByAmpersand() {
		$query = ['name' => 'john', 'age' => 2];
		$stringifier = new Stringifier($query);
		$string = $stringifier->stringify();
		$this->assertEquals($string, 'name=john&age=2');
	}
}