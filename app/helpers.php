<?php

use App\Models\Mediator_submissions;
use Illuminate\Support\Facades\DB;

function url_title($str, $separator = '-', $lowercase = FALSE)
{
	if ($separator === 'dash') {
		$separator = '-';
	} elseif ($separator === 'underscore') {
		$separator = '_';
	}

	$q_separator = preg_quote($separator, '#');

	$trans = array(
		'&.+?;'			=> '',
		'[^\w\d _-]'		=> '',
		'\s+'			=> $separator,
		'(' . $q_separator . ')+'	=> $separator
	);

	$str = strip_tags($str);
	foreach ($trans as $key => $val) {
		$str = preg_replace('#' . $key . '#i' . ('UTF-8' ? 'u' : ''), $val, $str);
	}

	if ($lowercase === TRUE) {
		$str = strtolower($str);
	}

	return trim(trim($str, $separator));
}

function favicon()
{
	$settings = DB::table('settings')->where('id', '1')->select('logo', 'favicon', 'footer_text')->first();
	return $settings;
}

function productImagePath($image_name)
{
	return public_path('images/products/' . $image_name);
}

function regionData($region_id)
{
    //\DB::connection()->enableQueryLog();
    $regions = Mediator_submissions::where(['region' => $region_id, 'status' => 1])->orderBy('id', 'DESC')->get();
    //$queries = \DB::getQueryLog();
    //dd(count($regions));
    //dd($queries);
    if (count($regions)) {
        return $regions;
    } else {
        return false;
    }
}
