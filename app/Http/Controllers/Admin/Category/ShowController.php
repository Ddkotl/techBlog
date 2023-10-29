<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Inertia\Inertia;
use Inertia\Response;

class ShowController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Category $category ): Response
    {
        return Inertia::render('Admin/Category/Show',[
            'category' =>$category
        ]);
    }

    

}
