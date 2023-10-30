<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class DeleteController extends Controller
{

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect(route('admin_post_index'));
    }

}
