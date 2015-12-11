<?php

use Qp\Parser;
use Qp\Stringifier;

namespace Qp;

class Qp {
	/**
	 * Parses the query string to an array
	 *
	 * @param string $query The query-string
	 * @return array
	 */
	public static function parse($query) {
		return Parser::make($query);
	}

	/**
	 * Stringifies the array query parameters.
	 *
	 * @param string $query The query-string
	 * @return array
	 */
	public static function stringify(array $query) {
		return Stringifier::make($query);
	}
}