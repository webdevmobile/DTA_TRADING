<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trade;
use App\Models\Session;
use App\Models\Training;
use Illuminate\View\View;
use App\Models\UserTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function index(): View {
        if($this->authorize('viewAny', User::class)){
            $users = User::whereIn('role', ['user', 'admin'])->with('trainings', 'session')->orderBy('created_at', 'desc')->get();
            return View('admin.users.index',[
                'users' => $users,
            ]);
        }
    }

    public function store(StoreUserRequest $request) {
        $user = User::create($request->validated());
        $user->trainings()->sync($request->validated('trainings'));
        // $user->session()->sync($request->validated('session_id'));
        return redirect()->route('admin.users.index')->with('success', 'ajout reussit');
    }

    public function create() : View
    {
        $user = new User();
        if($this->authorize('create', $user)){
            return View('admin.users.forms.create', [
                'user' => $user,
                'trainings' => Training::select('id', 'name')->get(),
                // 'sessions' => Session::pluck('name', 'id'),
                'sessions' => Session::select('id', 'name')->get()
            ]);
        }
    }

    public function edit(User $user) {
        if($this->authorize('update', $user)){
            return view('admin.users.forms.edit', [
                'user' => $user,
                'trainings' => Training::select('id', 'name')->get(),
                'sessions' => Session::select('id', 'name')->get(),
            ]);
        }
    }

    public function update(UpdateUserRequest $request, User $user) {
        $user->update($request->validated());
        $user->trainings()->sync($request->validated('trainings'));
        return redirect()->route('admin.users.index')->with('success', 'Modification Réussie');
    }

    public function destroy(User $user) {
        if($this->authorize('delete', $user)){
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Suppression Réussie');
        }
    }

    public function showUserTrades(User $user)
    {
        // $trades = Trade::with('user')->get();
        // foreach($trades as $trade) {
        //     dd($trade->user->name);
        // }
        if($this->authorize('view', $user)){
            $trades = $user->trades()->orderBy('created_at', 'desc')->get();
            return view('admin.users.trades', [
                // 'users' => User::all(),
                'trades' => $trades,
                'user' => $user
            ]);
        }
    }
}

