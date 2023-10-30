<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class EditController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(User $user ): Response
    {
        return Inertia::render('Admin/User/Edit',[
            'user' => $user
        ]);
    }

}
