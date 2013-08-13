<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Vendor extends Eloquent implements UserInterface, RemindableInterface {

    protected $guarded = array();

    public static $rules = array(
    	'name' => 'required',
    	'email' => 'required|email|unique:vendors,email',
    	'password' => 'required|confirmed|min:5',	
		'image' => 'image',
		'state' => 'required',
		'city' => 'required'
	);

	public static $bizElements = array(
		array('name'=>'name','label'=>'Name','type'=>'text'),
		array('name'=>'address','label'=>'Street Address','type'=>'text'),	
		array('name'=>'city','label'=>'City','type'=>'text'),
		array('name'=>'image','label'=>'Logo or Image','type'=>'file')
		);
	public static $loginElements = array(
		array('name'=>'email','label'=>'Email','type'=>'text','extra'=>''),
		array('name'=>'password','label'=>'Password','type'=>'password','extra'=>''),
		array('name'=>'password_confirmation','label'=>'Confirm Password','type'=>'password','extra'=>''),
		);

	public static function create(array $input)
	{
        $input = array_except($input, 'password_confirmation');
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