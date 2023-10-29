<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CreateController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function create( ): Response
    {
        return Inertia::render('Admin/Tag/Create');
    }

}
