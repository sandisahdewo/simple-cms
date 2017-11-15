<?php 

function dateToSlug($date) {
	$date = substr($date, 0, 7);
	$replaced = str_replace('-', '/', $date);
	return $replaced;
}

function content($content, $limit = null, $next = null) {
	$content = strip_tags($content);
	if($limit) {
		if(strlen($content) > $limit) {
		    return character_limiter($content, $limit, $next);
		} else {
			return $content;
		}
	} else {
		return $content;
	}
}

function character_limiter($content, $limit, $next = null) {
	if(strlen($content) > $limit) {
		return substr($content, 0, $limit). '... ' . $next;
	} else {
		return $content;
	}
}