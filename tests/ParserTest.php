<?php

use Qp\Parser;

class ParserTest extends PHPUnit_Framework_TestCase {
	public function testShouldParse() {
		$query = 'name=john&age=5';
		$parser = new Parser($query);
		$array = $parser->parse();
		$this->assertEquals($array, ['name' => 'john', 'age' => 5]);
	}

	public function testShouldParseArray() {
		$query = 'users[]=kier&users[]=jess';
		$parser = new Parser($query);
		$array = $parser->parse();
		$this->assertEquals($array, ['users' => ['kier', 'jess']]);
	}
}