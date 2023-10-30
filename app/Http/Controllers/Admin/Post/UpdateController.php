<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UpdateController extends Controller
{

    public function update(UpdateRequest $request,Post $post): RedirectResponse
    {
        $data= $request->validated();
        $post->update($data);
        return redirect(route('admin_post_show',$post));
    }

}
