<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class AdminMainController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index( ): Response
    {
        return Inertia::render('Admin/AdminMain');
    }

}
