<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Personal;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use App\Http\Requests\UsersRequest;
use App\Http\Requests\StorePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    public function index(): View {
        // Auth::user()->can('viewAny', Training::class);
        if($this->authorize('viewAny', Training::class)){
            return View('admin.personal.index',[
                'personals' => Personal::whereIn('role', ['Secretaire', 'Admin'])->get(),
            ]);
        }
    }

    public function store(StorePersonalRequest $request) {

        $request->validated();
        $hashPassword = Hash::make($request->input('password'));
        Personal::create([
            'name' => $request->input('name'),
            'subname' => $request->input('subname'),
            'email' => $request->input('email'),
            'password' => $hashPassword,
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'role' => $request->input('role'),
        ]);
        return redirect()->route('admin.personal.index')->with('success', 'ajout reussit');
    }

    public function create(): View {
        $personal = new Personal();
        return View('admin.personal.forms.create', [
            'personal' => $personal,
        ]);
    }

    public function edit(Personal $personal) {
        // $this->authorize('delete', $training);
        return view('admin.personal.forms.edit', [
            'personal' => $personal,
        ]);
    }

    public function update(UpdatePersonalRequest $request, Personal $personal) {
        $personal->update($request->validated());
        return redirect()->route('admin.personal.index')->with('success', 'Modification Réussie');
    }

    public function destroy(Personal $personal) {
        $personal->delete();
        return redirect()->route('admin.personal.index')->with('success', 'Suppression Réussie');
    }
}
