<?php

Class Ballr{
	public static function saveImage($image)
	{
		if(is_null($image)) return '';
		else
		{
			$newfilepath=storage_path().Config::get('ballr.images');
			$thumbspath=storage_path().Config::get('ballr.thumbs');
	        $newname=sha1(time().Str::random(5)).'.'.$image->guessExtension();
			$image = new Imagick($image->getPathname());
			$image->writeImage($newfilepath. $newname);
			$image->resizeImage(Config::get('ballr.thumbw'),Config::get('ballr.thumbh'), Imagick::FILTER_LANCZOS, 1, true);
			$image->writeImage($thumbspath. $newname);
	        return $newname;
		}	

	}

	public static function getImage($imagename)
	{
		return Config::get('ballr.images').$imagename;
	}
	public static function getThumb($imagename)
	{
		return Config::get('ballr.thumbs').$imagename;
	}
	public static function trunc($string, $length = 20)
	{
		if ($length >= strlen($string)) return e($string);
		else return e(substr($string, 0, $length-3).'...');
	}
	public static function curr($value)
	{
		return '&#8377 '.number_format($value, 2);
	}
	public static function hash($value)
	{
		return substr(hash_hmac ( 'md2' , $value , '2244' ), 0, 5);
	}
}