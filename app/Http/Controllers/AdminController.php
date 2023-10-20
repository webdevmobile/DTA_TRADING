<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Session;
use App\Models\Trade;
use App\Models\Training;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(): View {
        $users = User::select('id')->where('role', 'user')->count();
        $trades = Trade::select('id')->count();
        $trainings = Training::select('id')->count();
        $sessions = Session::select('id')->count();
        if($this->authorize('viewAny', Admin::class)){
            return view('admin.index', [
                'users' => $users,
                'trades' => $trades,
                'trainings' => $trainings,
                'sessions' => $sessions
            ]);
        }
    }
}
