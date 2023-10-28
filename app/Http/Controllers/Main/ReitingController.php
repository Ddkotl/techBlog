<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ReitingController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index( ): Response
    {
        return Inertia::render('Reiting');
    }

}
