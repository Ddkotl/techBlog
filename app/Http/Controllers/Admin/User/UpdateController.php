<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UpdateController extends Controller
{

    public function update(UpdateRequest $request,User $user): RedirectResponse
    {
        $data= $request->validated();
        $user->update($data);
        return redirect(route('admin_user_show',$user));
    }

}
