<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trade;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateTradeRequest;

class TradeController extends Controller
{
    public function index(): View {
        $trades = Trade::all();
        $user = auth()->user();
        $trades = $user->trades;
        // dd($trades);
        if($this->authorize('viewAny', Trade::class)) {
            return View('user.trade.index',[
                'trades' => $trades,
            ]);
        }
    }

    public function store(CreateTradeRequest $request) {
        $user = auth()->user();
        $user->trades()->create($this->extractData(new Trade(), $request));
        // $user->trades()->save($trade);
        // Trade::create($this->extractData(new Trade(), $request));
        return redirect()->route('user.trade.index')->with('success', 'ajout reussit');
    }

    public function create(): View {
        $trade = new Trade();
        return View('user.trade.forms.create', [
            'trade' => $trade
        ]);
    }

    public function edit(Trade $trade) {
        if($this->authorize('update', $trade)){
            return view('user.trade.forms.edit', [
                'trade' => $trade
            ]);
        }
    }

    public function update(CreateTradeRequest $request, Trade $trade) {
        if($this->authorize('update', $trade)) {
            $trade->update($this->extractData($trade, $request));
            return redirect()->route('user.trade.index')->with('success', 'Modification Réussie');
        }
    }

    public function destroy(Trade $trade) {
        $trade->delete();
        return redirect()->route('user.trade.index')->with('success', 'Suppression Réussie');
    }
    private function extractData (Trade $trade, CreateTradeRequest $request): array {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if ($image === null || $image->getError()) {
            return $data;
        }
        if ($trade->image) {
            Storage::disk('public')->delete($trade->image);
        }
        $data['image'] = $image->store('trades', 'public');
        return $data;
    }

}



