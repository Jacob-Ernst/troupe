<?php

class AnnouncementsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /announcements
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /announcements/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /announcements
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
        
        
        $announcement = new Announcement();
        
        $response = $this->saveAnnouncement($announcement);
        
        return $response;
	}

	/**
	 * Display the specified resource.
	 * GET /announcements/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /announcements/{id}/edit
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
	 * PUT /announcements/{id}
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
	 * DELETE /announcements/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function saveAnnouncement(&$announcement)
	{
		$announcement->title = Input::get('title');
        $announcement->info = Input::get('info');
        // $announcement->location = Input::get('location');
        
        $announcement->type = Input::get('type');
        
        
        //potential date input 
        
        // $announcement->date = Carbon::create(Input::get('d_year'), Input::get('d_month'), Input::get('d_day'));
        
        // $announcement->date->format('Y-m-d');
        
        
        $announcement->save();
        
        $id = $announcement->id;
        
        return Redirect::action('AnnouncementsController@show', array($id));
	}

}
