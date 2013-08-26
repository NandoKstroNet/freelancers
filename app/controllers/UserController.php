<?php

class UserController extends BaseController
{
	
	//list all user's system
	public function viewAll() 
	{
		return View::make('hello')->with('users', User::all());
	}

	//render a form 
	public function getAdd()
	{
		return View::make("add_user");
	}

	//save registration
	public function postAdd()
	{
		//define rules
		$rules = array(
			'nome'     => 'required', 
			'email'    => 'required|unique:users',
			'telefone' => 'required',
			'video'    => 'required'
		 );

		//define messages
		$messages = array(
			"required" => "Por favor preencha o campo :attribute!",
			"unique"   => "Já existe um usuário com este email"
		);

		//make the validation
		$validation = Validator::make(Input::all(), $rules, $messages);

		//Verify if fails validation
		if($validation->fails())
		{
			return Redirect::to("user/add")->withErrors($validation);

		} else {

			$video = explode('=', Input::get('video'));

			if($video[0] != 'http://www.youtube.com/watch?v')
				return View::make('add_user')->with('video', "Envie um link do youtube");
			
			if(Input::hasFile('avatar')) {
				
				$destinationPath = 'avatars/' ;
				$fileName = Input::file('avatar')->getClientOriginalName();

				if(Input::file('avatar')->move($destinationPath, $fileName)) {
					$user = new User();
					$user->nome     = filter_var(Input::get('nome'), FILTER_SANITIZE_STRING);
					$user->email    = filter_var(Input::get('email'), FILTER_SANITIZE_EMAIL);
					$user->telefone = filter_var(Input::get('telefone'), FILTER_SANITIZE_STRING);
					$user->avatar   = $fileName;
					$user->video    = filter_var($video[1], FILTER_SANITIZE_URL);
					$user->save();

					return View::make('add_user')->with('returns', TRUE);
				}
			} 
			else {
					return View::make('add_user')->with('returns', FALSE);
			}			
		}
	}

	//list perfil's user
	public function listPeril($user_id = null)
	{
		if(is_null($user_id))
			return Redirect::to("/");
		
		$user = User::findOrFail($user_id);

		return View::make('perfil_user')->with("user", $user);
	}
}