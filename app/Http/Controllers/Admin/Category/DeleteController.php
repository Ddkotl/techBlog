<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class DeleteController extends Controller
{

    public function delete(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect(route('admin_category_index'));
    }

}
