<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Inertia\Inertia;
use Inertia\Response;

class ShowController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Tag $tag ): Response
    {
        return Inertia::render('Admin/Tag/Show',[
            'tag' =>$tag
        ]);
    }

    

}
