<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/
'required' => 'กรุณาเติมช่อง :attribute ด้วย',
		'min' =>  'ช่อง :attribute ต่องมีตัวอักษรไม่ต่ำกว่า :values',
		'confirmed' => 'รหัสผ่านผ่านไม่ตรงกัน',
		'Email' => 'กรุณาป้อนอีเมล์ที่ถูกต้อง',
		'active_url' =>'เว็บไซต์นี้ ดูเหมือนจะเข้าไม่ได้ครับ',
		'digit' => 'กรุณาป้อนเลขที่เป็นหลักสิบด้วยครับ',
		'mimes' => 'รูปไม่ตรงกับนามสกุลที่กำหนดไสว้ครัส',
 		"recaptcha" => 'กรุณากรอก captcha ให้ถูกด้วยครัส',
 		'integer' =>'ค่าต้องเป็นจำนวนบวก ครับ',
 		'postcode.min' =>' รหัสไปรษณีย์ ต้องมี 5 ตัว',
	


	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),
	'alpha_space' => "The :attribute field may only contain letters, commas, spaces and dashes.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
