<?php namespace App\Api\Classes;

class UserTransformer extends Transformer {

    public function transform($user)
    {
        // To Do:
        // Figure out how to format resources
        // belonging to users.

        return [
            'id'     => $user->id,
            'name'   => $user->first_name . ' ' . $user->last_name,
            'gender' => $user->gender,
            'dob'    => $user->dob_ember_format,
            'bio'    => $user->bio,
            'resume' => $user->resume,
            'avi'    => $user->avi
        ];

    }



}
