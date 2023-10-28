<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
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
        Category::firstOrCreate($data);
        return redirect(route('admin_category_index'));
    }

}
