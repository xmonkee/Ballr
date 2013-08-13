<?php

Class Ballr{
	public static function saveImage($image){
		if(is_null($image)) return '';
		else{
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
}