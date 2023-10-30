<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class ShowController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Post $post ): Response
    {
        return Inertia::render('Admin/Post/Show',[
            'post' =>$post
        ]);
    }

    

}
