<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class DeleteController extends Controller
{

    public function delete(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect(route('admin_tag_index'));
    }

}
