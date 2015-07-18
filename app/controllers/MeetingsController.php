<?php

use Carbon\Carbon;


class MeetingsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /events
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /events/create
	 *
	 * @return Response
	 */
	public function create()
	{
        if (Auth::user()->role == 'organizer' || Auth::user()->role == 'admin') 
        {
            $validator = Validator::make($data = Input::all(), Meeting::$first_rules);

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            
            Input::flash();
            return View::make('meetings.create');
        }
        else 
        {
            return Redirect::action('HomeController@showHome');
        }
        
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /events
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Meeting::$final_rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        
        $meeting = new Meeting();
        
        $response = $this->saveMeeting($meeting);
        
        return $response;
	}

	/**
	 * Display the specified resource.
	 * GET /events/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$users = DB::select(
			'SELECT U.first_name, U.last_name, U.id, R.role
			FROM users AS U
			JOIN meeting_user as P 
				ON U.id = P.user_id
			JOIN roles as R
			  	ON P.role_id = R.id
			WHERE P.meeting_id = ?',
 	    [$id]);
        
        $meeting = Meeting::find($id);
        
        if (!$meeting) {
            Log::info('User encountered 404 error', Input::all());
            App::abort(404);
        }
        
        return View::make('meetings.show', compact('users', 'meeting'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /events/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$meeting = Meeting::find($id);
        
        if(!$meeting)
        {
            App::abort(404);
        }
        
        return View::make('meetings.edit')->with('meeting', $meeting);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /events/{id}
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
	 * DELETE /events/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function saveMeeting(&$meeting)
	{
		$meeting->title = Input::get('title');
        $meeting->summary = Input::get('summary');
        $meeting->brief_summary = Input::get('brief_summary');
        $meeting->location = Input::get('location');
        
        $user = Auth::user();
        
        $meeting->user_id = $user->id;
        
        if (Input::get('published')) {
            $meeting->published = 1;
        }
        else{
            $meeting->published = 0;
        }
        
        $meeting->type = Input::get('type');
        
        
        //concatonate the three dropdowns 
        
        $meeting->date = Carbon::create(Input::get('d_year'), Input::get('d_month'), Input::get('d_day'));
        
        $meeting->date->format('Y-m-d');
        
        
        $meeting->save();
        
        $id = $meeting->id;
        
        if (Input::hasFile('main_photo')) {
            $file = Input::file('main_photo');
            $orig_name = str_random(6) . $file->getClientOriginalName();
            $dest_path = public_path("img/meetings-main/$id/" . $orig_name);
            $img = Image::make($file->getRealPath());
            $img->crop(intval(Input::get('width')), intval(Input::get('height')), intval(Input::get('x')), intval(Input::get('y')));
            $img->resize(600, 338);
            // dd($dest_path);
            $img->save($dest_path);
            
            $meeting->main_photo = "/img/meetings-main/$id/" . $orig_name;
            
            $meeting->save();
        }
        
        return Redirect::action('MeetingsController@show', array($id));
	}
    
    public function uploadAvi ()
    {
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $dest_path = public_path() . "/img/meetings-main/$id/";
            $orig_name = str_random(6) . $file->getClientOriginalName();
            $dest_path .= $orig_name;
            $img = Image::make($file->getRealPath());
            $img->crop(intval(Input::get('width')), intval(Input::get('height')), intval(Input::get('x')), intval(Input::get('y')));
            $img->resize(300, 300);
            $img->save($dest_path);
            
            $user->avi = "/img/avi/$id/" . $orig_name;
            
            $user->save();

            return Redirect::action('UsersController@show', array($id));
        }
        return Redirect::action('HomeController@showHome');
    }

}
