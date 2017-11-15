<?php

function GetConfigLocale($name) {
	return Illuminate\Support\Facades\Config::get("locale.".$name);
}

function CarbonTime($format = null, $time = null) {
	if (!$time) {
		return Carbon\Carbon::now()->format(($format) ?: GetConfigLocale('time'));
	}
	return Carbon\Carbon::parse($time)->format(GetConfigLocale('time'));
}

function CarbonDate($format = null, $date = null) {
	if(!$format) {
		$format = GetConfigLocale('date');
	}
	if(!$date) {
		return Carbon\Carbon::now()->format($format);
	} 
	return Carbon\Carbon::parse($date)->format($format);
}

function CarbonDateTime($dateTime = null) {
	if(!$dateTime) {
		return Carbon\Carbon::now()->format(GetConfigLocale('date_time'));
	} 
	return Carbon\Carbon::parse($dateTime)->format(GetConfigLocale('date_time'));
}

function CarbonHumanDate($format = null, $date = null) {
	if(!$format) {
		$format = GetConfigLocale('human_date');
	}
	
	setlocale(LC_TIME, GetConfigLocale('timezone'));
	if(!$date) {
		return strftime($format);
	} 
	return strftime($format, strtotime(CarbonDate($date)));
}

function CarbonHumanDateTime($dateTime = null) {
	setlocale(LC_TIME, GetConfigLocale('timezone'));
	if(!$dateTime) {
		return strftime(GetConfigLocale('human_date_time'));
	}
	return strftime(GetConfigLocale('human_date_time'), strtotime(CarbonDate($dateTime)));
}
