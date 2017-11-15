<?php
function boolean($condition = true, $result_true = null, $result_false = null) {

	if($condition) {
		return isset($result_true) ? $result_true : GetConfigLocale('result_true');
	}
	return isset($result_false) ? $result_false : GetConfigLocale('result_false');
}

function ifExists($var = false, $noExists = false) {
	if(isset($var)) {
		$result = $var;
	} else {
		$result = $noExists;
	}
	return $result;
}