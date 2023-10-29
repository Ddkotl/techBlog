<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;
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
        Tag::firstOrCreate($data);
        return redirect(route('admin_tag_index'));
    }

}
