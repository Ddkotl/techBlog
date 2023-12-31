<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index( ): Response
    {
        return Inertia::render('Admin/User/Index',[
            'users' =>User::latest()->paginate(5)
        ]);
    }

    

}
