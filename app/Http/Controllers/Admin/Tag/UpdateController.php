<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UpdateController extends Controller
{

    public function update(UpdateRequest $request,Tag $tag): RedirectResponse
    {
        $data= $request->validated();
        $tag->update($data);
        return redirect(route('admin_tag_show',$tag));
    }

}
