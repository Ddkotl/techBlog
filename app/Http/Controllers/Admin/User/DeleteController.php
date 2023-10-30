<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class DeleteController extends Controller
{

    public function delete(User $user): RedirectResponse
    {
        $user->delete();
        return redirect(route('admin_user_index'));
    }

}
