<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Inertia\Inertia;
use Inertia\Response;

class EditController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Tag $tag ): Response
    {
        return Inertia::render('Admin/Tag/Edit',[
            'tag' => $tag
        ]);
    }

}
