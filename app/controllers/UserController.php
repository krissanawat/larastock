<?php 

class UserController extends BaseController {


    public function login(){
        
        if(Request::isMethod('post')){
        	$rules = array(
			'email'    => 'required|email',
			'password' => 'required|between:3,32',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		try
		{
//                    dd(Input::all());
			// Try to log the user in
			Sentry::authenticate(Input::only('email', 'password'));

			// Get the page we were before
			$redirect = Session::get('loginRedirect', 'account');

			// Unset the page we were before from the session
			Session::forget('loginRedirect');

			// Redirect to the users page
			return Redirect::to($redirect)->with('success','ยินดีต้อนรับเข้าสู่ระบบ');
		}
                catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
                {
                       return Redirect::back()->with('danger','กรุณาใส่ชื่อผู้ใช้งานด้วย');
                }
                catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
                {
                      return Redirect::back()->with('danger','กรุณาใส่รหัสผ่านด้วย');
                }
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::back()->with('danger','ไม่พบผู้ใช้งานที่ใช้อีเมล์นี้');
		}
                catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return Redirect::back()->with('danger','รหัสผ่านผิดพลาด');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			return Redirect::back()->with('danger','ผู้ใช้งานนี้ยังไม่ได้ยืนยันตัวเอง');
		}
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			return Redirect::back()->with('danger','ผู้ใช้งานนี้ถูกระงับการใช้งานชั่คราว');
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			return Redirect::back()->with('danger','ผู้ใช้งานนี้ถูกระงับการใช้งานถาวร');
		}

		// Ooops.. something went wrong
		return Redirect::back()->withInput()->withErrors($this->messageBag);
        }else{
            return View::make('auth.signin');
        }
        
       
    }
    
     public function index(){
        
        if(Request::isMethod('post')){
        	// kint::dump(Input::file('pic'));dd();
        	$user = Input::only('email','password','first_name','last_name','pic');
        	$this->create($user);
        }else{
        	$user = User::all();
        	return View::make('users.index')->with('user',$user);
        }
     }

     public function create($user){

		     	try
			{
			    $data = Sentry::findUserById(Input::get('id'));
			    if($user){
			    $data->email = $user['email'];
			    $data->first_name = $user['first_name'];
			    $data->last_name = $user['last_name'];
			    $data->password = Hash::make($user['password']);
			    $data->save();
			    }else{
					Sentry::createUser(array(
						'id'     => Input::get('id'),
						'email'     => $user['email'],
						'password'  => Hash::make($user['email']),
						'first_name'     => $user['first_name'],
						'last_name'  => $user['last_name'],
						'activated' => true,
					));
			    }
				

				return Redirect::to('user/index')->with('success','เพิ่มผู้ใช้งานสำเร็จ');

			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				return Redirect::back()->with('danger','กรณากรอกอีเมล์ด้วย');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
				return Redirect::back()->with('danger','กรณากรอกรหัสด้วย');
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
				return Redirect::back()->with('danger','อีเมล์นี้ถูกใช้งานแล้ว');
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
				return Redirect::back()->with('danger','ไม่พบกลุ่ม');
			}
     }
}