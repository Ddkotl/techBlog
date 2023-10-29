<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UpdateController extends Controller
{

    public function update(UpdateRequest $request,Category $category): RedirectResponse
    {
        $data= $request->validated();
        $category->update($data);
        return redirect(route('admin_category_show',$category));
    }

}
