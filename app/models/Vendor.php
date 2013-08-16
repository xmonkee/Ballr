<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Vendor extends Eloquent implements UserInterface, RemindableInterface {

    protected $fillable = array('name',
    	'email',
    	'password',
    	'image',
    	'state',
    	'city',
    	'address',
    	'store',
    	'description');

    public static $rules = array(
    	'name' => 'required|unique:vendors,name',
    	'email' => 'required|email|unique:vendors,email',
    	'password' => 'required|confirmed|min:5',	
		'image' => 'image',
		'state' => 'required',
		'city' => 'required',
		'description' => 'min:10|max:200'
	);

	public static function create(array $input)
	{
        $input['password'] = Hash::make($input['password']);
        $input['image'] = Ballr::saveImage($input['image']);
		return parent::create($input);
	}

/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vendors';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}