<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingResquest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Session;
use App\Models\Training;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function index(): View {
        // Auth::user()->can('viewAny', Training::class);
        if($this->authorize('viewAny', Training::class)){
            return View('admin.training.index',[
                'trainings' => Training::with('session', 'users')->get(),
            ]);
        }
    }

    public function store(StoreTrainingRequest $request) {
        Training::create($request->validated());
        return redirect()->route('admin.training.index')->with('success', 'ajout reussit');
    }

    public function create(): View {
        $training = new Training();
        return View('admin.training.forms.create', [
            'training' => $training,
            'sessions' => Session::select('id', 'name')->get()
        ]);
    }

    public function edit(Training $training) {
        // $this->authorize('delete', $training);
        return view('admin.training.forms.edit', [
            'training' => $training,
            'sessions' => Session::select('id', 'name')->get()
        ]);
    }

    public function update(UpdateTrainingResquest $request, Training $training) {
        $training->update($request->validated());
        return redirect()->route('admin.training.index')->with('success', 'Modification Réussie');
    }

    public function destroy(Training $training) {
        $training->delete();
        return redirect()->route('admin.training.index')->with('success', 'Suppression Réussie');
    }

    public function showTrainingUsers (Training $training)
    {
        $trainingUsers = $training->users()->where('role', 'user')->orderBy('created_at', 'desc')->get();
        // dd($trainingUsers);
        return view('admin.training.trainingUsers', [
            'trainingUsers' => $trainingUsers,
            'training' => $training
        ]);
    }
}
