<?php

namespace App\Http\Controllers\Admin\Data\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\Pembayaran;
use Illuminate\Http\Request;

class PembayaranMasukController extends Controller
{
    public function index()
    {
        return view('admin.data.pembayaran.pembayaranmasuk.index', [
            'list_pembayaranmasuk' => Pembayaran::where('status', 'Paid')->latest()->get()
        ]);
    }

    public function show(Pembayaran $pembayaran)
    {
        return view('admin.data.pembayaran.pembayaranmasuk.show', [
            'pembayaran' => $pembayaran
        ]);
    }
}
