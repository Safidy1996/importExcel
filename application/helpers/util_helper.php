<?php

	function asset_url($css_name){
		return base_url('assets/'.$css_name.'');
	}
	
	function css_url($css_name){
		return base_url('assets/css/'.$css_name.'');
	}

	function js_url($js_name){
		return base_url('assets/js/'.$js_name.'');
	}

	function img_url($img_name){
		return base_url('assets/images/'.$img_name);
	}
	function plugins_url($plug_name){
		return base_url('assets/plugins/'.$plug_name);
	}

	function current_url_(){
		return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	}

	function format_date($date){
		$date_ = explode(" ", $date)[0];
		$date_temp = explode("-", $date_);
		return $date_temp[2] . "/" . $date_temp[1] . "/" . $date_temp[0];
	}
	function format_date_1($date){
		
		$date_temp = explode("/", $date);
		return $date_temp[2] . "/" . $date_temp[1] . "/" . $date_temp[0];
	}
	function format_date_time($date){
		$date_ = explode(" ", $date);
		$date_temp = explode("-", $date_[0]);
		return $date_temp[2] . "/" . $date_temp[1] . "/" . $date_temp[0] . " " . $date_[1];
	}

	function get_time(){
		return date("h:i:s");
	}

	function getDateTimeNow(){
		return date('Y-m-d H:i:s');
	}