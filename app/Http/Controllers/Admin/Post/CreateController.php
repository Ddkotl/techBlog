<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Inertia\Inertia;
use Inertia\Response;

class CreateController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function create(Category $categories,Tag $tags ): Response
    {
        return Inertia::render('Admin/Post/Create',[
          'categories' => $categories,
          'tags' => $tags
        ]);
    }

}
