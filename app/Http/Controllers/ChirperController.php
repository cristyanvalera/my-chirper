<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\View\View;

class ChirperController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'chirps' => Chirp::query()
                ->select(['id', 'user_id', 'message', 'created_at', 'updated_at'])
                ->with('user:id,name')
                ->latest('id')
                ->simplePaginate(5),
        ]);
    }
}
