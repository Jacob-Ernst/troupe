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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /events
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Meeting::$rules);

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
		//
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
        $meeting->location = Input::get('location');
        
        $meeting->type = Input::get('type');
        
        
        //concatonate the three dropdowns 
        
        $meeting->date = Carbon::create(Input::get('d_year'), Input::get('d_month'), Input::get('d_day'));
        
        $meeting->date->format('Y-m-d');
        
        
        $meeting->save();
        
        $id = $meeting->id;
        
        return Redirect::action('MeetingsController@show', array($id));
	}

}
