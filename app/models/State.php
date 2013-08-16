<?php

class State extends Eloquent {
    protected $guarded = array();

    public static $rules = array();
    
    public static function statelist(){
	// $statelist=array();
	return self::orderBy('state')->lists('state','id');
	// foreach ($states as $state) {
	// 	$statelist[$state->id]=$state->state;
	// 	}
	// return $statelist;
	}
}
