<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ShowController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(User $user ): Response
    {
        return Inertia::render('Admin/User/Show',[
            'user' =>$user
        ]);
    }

    

}
