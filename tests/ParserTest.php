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

	public function testShouldParseObjcts() {
		$query = 'user[username]=srph&user[email]=yolo@swag.com&user[password]=1234';
		$parser = new Parser($query);
		$array = $parser->parse();
		
		$this->assertEquals($array, ['user' => [
			'username' => 'srph',
			'email' => 'yolo@swag.com',
			'password' => '1234'
		]]);
	}

	public function testShouldDefaultValueToEmptyString() {
		$query = 'user=';
		$parser = new Parser($query);
		$array = $parser->parse();

		$this->assertEquals($array['user'], '');
	}

	public function testShouldSetRedundantEqualsAsValue() {
		$query = 'user===';
		$parser = new Parser($query);
		$array = $parser->parse();

		$this->assertEquals($array['user'], '==');
	}
}