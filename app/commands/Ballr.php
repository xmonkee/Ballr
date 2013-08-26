<?php

Class Ballr{
	public static function get($value)
	{
		return Config::get('ballr.'.$value);
	}

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
		if ($length >= strlen($string)) return $string;
		else return substr($string, 0, $length-3).'...';
	}

	//return hash of product id to make un-iterable url's for products
	public static function hash($value)
	{
		return substr(hash_hmac ( 'md2' , $value , '2244' ), 0, 5);
	}

	public static function getPrice($value)
	{
		if(is_null($value)) return 'NA';
		return Ballr::get('curr'). number_format($value, 2);
	}
}