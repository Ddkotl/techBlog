<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class EditController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Post $post ): Response
    {
        return Inertia::render('Admin/Post/Edit',[
            'post' => $post
        ]);
    }

}
