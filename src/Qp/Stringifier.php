<?php

namespace Qp;

class Stringifier {
	/**
	 * Query params to be parsed
	 * @param array
	 */
	protected $query;

	/**
	 * @param array Query params to be parsed
	 */
	public function __construct(array $query) {
		$this->query = $query;
	}

	/**
	 * A helper to automatically parse the given query
	 *
	 * @return string
	 */
	public static function make(array $query) {
		return (new static($query))->stringify();
	}

	/**
	 * Stringifies the array query parameters.
	 *
	 * @return array
	 */
	public function stringify() {
		return http_build_query($this->query);
	}
}