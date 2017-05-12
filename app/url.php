<?php
namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model; 
class url  extends Model {
	
	public $timestamps = false;
	public $table = 'tbl_urlshort';

	public static function get_unique_short_url()
	{
		$shortened = base_convert(rand(10000,99999), 10, 36);
		if ( static::whereshortened($shortened)->first() ) {
			return static::get_unique_short_url();
		}

		return $shortened;
	}
}