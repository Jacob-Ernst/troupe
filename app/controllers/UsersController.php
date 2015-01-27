<?php

class UsersController extends BaseController {
	
	
	public function __construct()
    {
        parent::__construct();
        
        
        $this->beforeFilter('auth', array('except' => array('store')));
    }
	
	
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = User::with('media');
        
        if (count(Input::all())) {
        	$type = strtolower(Input::get('type'));
        	$query->where('type', '=', "$search");
            $query->orWhereHas('media', function($mediaSearch){
                $media = [];
                                
                foreach (explode(',', Input::get('media')) as $value) {
                	$media[] = $value;
            	}
                $mediaSearch->whereIn('media', $media);
            });
            $meta = [];
            foreach (explode(' ', Input::get('name')) as $value) {
                $meta[] = metaphone($value);
            }
            $query->orWhereIn('first_name_meta', $meta);
            $query->orWhereIn('last_name_meta', $meta);
        }
            
        $users = $query->orderBy('last_name', 'ASC')->paginate(6);

        return View::make('users.index')->with('users', $users);
	
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        
        
        $user->save();
            
        $id = $user->id;
        
        return Redirect::action('UsersController@show', array($id));
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
        
        
        if (!$user) {
            Log::info('User encountered 404 error', Input::all());
            App::abort(404);
        }
        
        return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
