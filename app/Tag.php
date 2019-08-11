<?php

namespace App;

class Tag
{
	// Let's do some pure PHP things
    public static function normalize($tag_string) {
		// Normalize tags string
		// - string -> array
		// - 3+ chars, trim and lower case
		// - unique non empty values values
		$tags = [];
		$tmp = explode(",", $tag_string);
		foreach ($tmp as $tag) {
			$tag = self::normalizeTag($tag);
			if ($tag && !in_array($tag, $tags)) {
				$tags[] = $tag;
			}
		}
		sort($tags);
		return $tags;
	}
	
	public static function normalizeTag($tag) {
		$tag = mb_strtolower(trim($tag));
		return mb_strlen($tag)>2?$tag:false;
	}
}
