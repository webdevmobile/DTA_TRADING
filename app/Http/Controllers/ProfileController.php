<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeProfilePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function uptadeProfile(UpdateProfileRequest $request)
    {
        /**@var User $user */
        $user = auth()->user();

        $request->validated();

        $user->update([
            'email' => $request->email,
        ]);

        // Mettre à jour la photo de profil si elle est téléchargée
        if ($request->hasFile('avatar')) {
            // Stockez la nouvelle photo de profil
            $imagePath = $request->file('avatar')->store('avatar', 'public');

            // Supprimez l'ancienne photo de profil s'il en existe une
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Mettez à jour le chemin de la photo de profil dans la base de données
            $user->update([
                'avatar' => $imagePath,
            ]);
        }

        return redirect()->route('admin.profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }

    public function changePassword(ChangeProfilePasswordRequest $request)
    {
        $request->validated();

        /**@var User $user */
        $user = auth()->user();

        if (Hash::check($request->current_password, $user->password)) {
            $new_password = ['password' => Hash::make($request->new_password)];
            $user->update($new_password);

            return redirect()->route('admin.profile.edit')->with('success', 'Mot de passe changé avec succès.');
        }

        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.'])->withInput();
    }
}
