<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
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
        User::firstOrCreate($data);
        return redirect(route('admin_user_index'));
    }

}
