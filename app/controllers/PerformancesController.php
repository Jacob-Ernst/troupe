<?php

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
		//
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
