<?php

class State extends Eloquent {
    protected $guarded = array();

    public static $rules = array();
    
    public static function statelist(){
	$statelist=array();
	$states=self::all();
	foreach ($states as $state) {
		$statelist[$state->id]=$state->state;
		}
	return $statelist;
	}
}
