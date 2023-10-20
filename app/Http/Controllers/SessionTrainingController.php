<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionResquest;

class SessionTrainingController extends Controller
{
    public function index(): View {
        if($this->authorize('viewAny', Session::class)){
            return View('admin.sessions.index',[
                'sessions' => Session::all(),
            ]);
        }
    }

    public function store(StoreSessionRequest $request) {
        Session::create($request->validated());
        return redirect()->route('admin.sessions.index')->with('success', 'ajout reussit');
    }

    public function create(): View {
        $session = new Session();
        return View('admin.sessions.forms.create', [
            'session' => $session
        ]);
    }

    public function edit(Session $session) {
        return view('admin.sessions.forms.edit', [
            'session' => $session
        ]);
    }

    public function update(UpdateSessionResquest $request, Session $session) {
        $session->update($request->validated());
        return redirect()->route('admin.sessions.index')->with('success', 'Modification Réussie');
    }

    public function destroy(Session $session) {
        $session->delete();
        return redirect()->route('admin.sessions.index')->with('success', 'Suppression Réussie');
    }
}
