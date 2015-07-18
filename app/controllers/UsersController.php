<?php

use Carbon\Carbon;

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
		
        
        if (!empty(Input::all())) {
        	if((Input::get('type') != 'none') && !empty(Input::get('type'))){
	        	$type = strtolower(Input::get('type'));
	        	$query->where('type', '=', "$type");
        	}
        	
        	if(!empty(Input::get('media'))){
	            $query->WhereHas('media', function($mediaSearch){
	                $media = [];
	                                
	                foreach (explode(',', Input::get('media')) as $value) {
	                	$media[] = $value;
	            	}
	                $mediaSearch->whereIn('medium', $media);
	            });
	        }
	        
	        if (
	        	(Input::get('male')      == 'm') || 
	        	(Input::get('female')    == 'f') || 
	        	(Input::get('other')     == 'o') || 
	        	(Input::get('not_given') == 'p')
	           ) 
	        {
	        	
	        	$male      = Input::get('male')      == 'm' ? 'm' : '';
	        	$female    = Input::get('female')    == 'f' ? 'f' : '';
	        	$other     = Input::get('other')     == 'o' ? 'o' : '';
	        	$not_given = Input::get('not_given') == 'p' ? 'p' : '';
	        	
	        	$gender_inputs = [$male, $female, $other, $not_given];
	        	
	        	$genders = [];
	        	                    
                foreach ($gender_inputs as $value) {
                	if(!empty($value)){
                		$genders[] = $value;
                	}
            	}
	                $query->whereIn('gender', $genders);
        	}
        	
        	if(
        		(Input::get('type') == 'none' || empty(Input::get('type'))) &&
        		 Input::get('male')      != 'm' &&
				 Input::get('female')    != 'f' &&
				 Input::get('other')     != 'o' &&
				 Input::get('not_given') != 'p' &&
				 empty(Input::get('media'))     &&
				 Input::has('name')
				 
        	  )
        	{
        		$meta = [];
	            foreach (explode(' ', Input::get('name')) as $value) {
	                $meta[] = metaphone($value);
	            }
	            $query->WhereIn('first_name_meta', $meta);
	            $query->orWhereIn('last_name_meta', $meta);
        	}
        	else{
	            $meta = [];
	            foreach (explode(' ', Input::get('name')) as $value) {
	                $meta[] = metaphone($value);
	            }
	            $query->orWhereIn('first_name_meta', $meta);
	            $query->orWhereIn('last_name_meta', $meta);
        	}
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
		$validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        
        $user = new User();
        
        $response = $this->saveUser($user);
        
        Auth::login($user);
        
        return $response;
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
		$user = User::with('media')->find($id);
        
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
        if(Auth::user()->id == $id){
    		$user = User::with('media')->find($id);
            
            if (!$user) {
                Log::info('User encountered 404 error', Input::all());
                App::abort(404);
            }
            
            return View::make('users.edit', compact('user'));
        }
        else{
            Session::flash('errorMessage', "Can't edit someone else's profile");
            return Redirect::back();
        }
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
	
	public function saveUser(&$user)
    {
        
        $user->email = Input::get('email');
        $user->password = Input::get('first_password');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->gender = Input::get('gender');
        $user->type = Input::get('type');
        $user->role = 'user';
        
        //concatonate the three dropdowns 
        
        $user->date_of_birth = Carbon::create(Input::get('b_year'), Input::get('b_month'), Input::get('b_date'));
        
        $user->date_of_birth->format('Y-m-d');
        
        
        $user->save();
        
        if (Input::has('media')) {
            $user->media = Input::get('media');
        }
            
        $id = $user->id;
        
        return Redirect::action('UsersController@show', array($id));
        
    }
    
    public function uploadAvi ()
    {
        $user = Auth::user();
        $id = $user->id;
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $dest_path = public_path() . "/img/avi/$id/";
            $orig_name = str_random(6) . $file->getClientOriginalName();
            $dest_path .= $orig_name;
            $img = Image::make($file->getRealPath());
            $img->crop(intval(Input::get('width')), intval(Input::get('height')), intval(Input::get('x')), intval(Input::get('y')));
            $img->resize(300, 300);
            // dd($dest_path);
            $img->save($dest_path);
            
            $user->avi = "/img/avi/$id/" . $orig_name;
            
            $user->save();

            return Redirect::action('UsersController@show', array($id));
        }
        return Redirect::action('HomeController@showHome');
    }

}
