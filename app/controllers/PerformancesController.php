<?php

use Carbon\Carbon;


class PerformancesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /performances
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
	
	public function savePerformance(&$performance)
	{
		$performance->title = Input::get('title');
        $performance->summary = Input::get('summary');
        $performance->location = Input::get('location');
        
        $performance->type = Input::get('type');
        
        
        //concatonate the three dropdowns 
        
        $performance->date = Carbon::create(Input::get('d_year'), Input::get('d_month'), Input::get('d_day'));
        
        $performance->date->format('Y-m-d');
        
        
        $performance->save();
        
        
            
        $id = $performance->id;
        
        $file = Input::file('script');
        
        $dest_path = public_path() . "/scripts/performances/$id/";
		$orig_name = "troupe_" . str_random(6) . $file->getClientOriginalName();
		
		$file->move($dest_path, $orig_name);
		
        $performance->script = $dest_path . $orig_name;
        $performance->save();
        
        return Redirect::action('PerformancesController@show', array($id));
	}
	
	

	/**
	 * Show the form for creating a new resource.
	 * GET /performances/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /performances
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Performance::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        
        $performance = new Performance();
        
        $response = $this->savePerformance($performance);
        
        return $response;
	}

	/**
	 * Display the specified resource.
	 * GET /performances/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$users = DB::select(
			'SELECT U.first_name, U.last_name, U.id, R.role
			FROM users AS U
			JOIN performance_user as P 
				ON U.id = P.user_id
			JOIN roles as R
			  	ON P.role_id = R.id
			WHERE P.performance_id = ?',
 	    [$id]);
        
        $performance = Performance::with('videos')->find($id);
        
        if (!$performance) {
            Log::info('User encountered 404 error', Input::all());
            App::abort(404);
        }
        
        return View::make('performances.show', compact('users', 'performance'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /performances/{id}/edit
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
	 * PUT /performances/{id}
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
	 * DELETE /performances/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	
	

}
