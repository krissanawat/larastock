<?php

 use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

 class User extends SentryUserModel {

     /**
      * The database table used by the model.
      *
      * @var string
      */
     protected $table = 'users';

     /**
      * The attributes excluded from the model's JSON form.
      *
      * @var array
      */
     protected $hidden = array('password');
     protected $fillable = array(
          'first_name', 'last_name', 'email', 'locale', 'address', 'province_id', 'telephone',
          'gender', 'id', 'password', 'postcode', 'bizname', 'webiste', 'Latitute', 'amphur_id',
          'Longtitute', 'general_info', 'remember_token');
     public $guard = array('password');
     public static $rules = array(
          'first_name' => 'required|min:2|alpha',
          'last_name' => 'required|min:2|alpha',
          'email' => 'required|email|unique:users',
          'password' => 'required|alpha_num|min:6|confirmed',
          'password_confirmation' => 'required|alpha_num|min:6',
          'telephone' => 'required|between:10,12'
     );
     public function fullName() {
         return "{$this->first_name} {$this->last_name}";
     }

     /**
      * Returns the user Gravatar image url.
      *
      * @return string
      */
     public function gravatar() {
         // Generate the Gravatar hash
         $gravatar = md5(strtolower(trim($this->gravatar)));

         // Return the Gravatar url
         return "//gravatar.com/avatar/{$gravatar}";
     }

     public function getRememberToken() {
         return $this->remember_token;
     }

     public function setRememberToken($value) {
         $this->remember_token = $value;
     }

     public function getRememberTokenName() {
         return 'remember_token';
     }

     public function prakad() {
         return $this->hasMany('Prakad', 'user_id');
     }

 }
 