<?php

namespace App\Http\Controllers;

use App\Models\Masakan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        if (!request('type') || request('type') != 'makanan' && request('type') != 'minuman') {
            return redirect('/pesanan?type=makanan');
        }

        return view('dashboard.pesanan', [
            'masakan' => Masakan::latest()->where('type', request('type'))->get()
        ]);
    }
}