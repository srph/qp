<?php

namespace Qp;

class Parser {
	const STRING_ARRAY_REGEX = "/\[\]$/";
	const STRING_OBJECT_REGEX = "/\[.*\]$/";

	/**
	 * Query-string to be parsed
	 * @param string
	 */
	protected $query;

	/**
	 * @param string Query-string to be parsed
	 */
	public function __construct($query) {
		$this->query = $query;
	}

	/**
	 * A helper to automatically parse the given query
	 *
	 * @return string
	 */
	public static function make($query) {
		return (new static($query))->parse();
	}

	/**
	 * Parses the query string to an array
	 *
	 * @return array
	 */
	public function parse() {
		// Remove `?` from query. (?yolo=swag => yolo=swag)
		$query = substr($this->query, 0, 1) === '?'
			? substr($this->query, 1)
			: $this->query;

		$result = [];
		$queries = explode('&', $query);

		foreach($queries as $query) {
			$set = explode('=', $query);
			$key = $set[0];
			$value = $set[1];

			// @TODO
			// Recursively
			// If the value is an array (e.g., `users[]=pogi`)
			if ( preg_match(self::STRING_ARRAY_REGEX, $key) ) {
				$key = substr($key, 0, strlen($key) - 2);

				if ( !isset($result[$key]) ) {
					$result[$key] = [];
				}

				$result[$key][] = $value;
			// If the value is an object (e.g., `user[name]=pogi`)
			} else if ( preg_match(self::STRING_OBJECT_REGEX, $key, $matches) ) {
				$subkey = substr($matches[0], 1);
				$subkey = substr($subkey, 0, strlen($subkey) - 1);
				$key = substr($key, 0, (strlen($key) - 3) - (strlen($subkey) - 1));

				if ( !isset($result[$key]) ) {
					$result[$key] = [];
				}

				$result[$key][$subkey] = $value;
			} else {
				$result[$key] = $value;
			}
		}

		return $result;
	}
}