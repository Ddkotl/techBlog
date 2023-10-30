<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class StoreController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $data= $request->validated();
        Post::firstOrCreate($data);
        return redirect(route('admin_post_index'));
    }

}
