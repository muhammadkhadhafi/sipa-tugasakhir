<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\KategoriPembayaran;
use App\Models\Admin\Data\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.pembayaran.index', [
            'list_pembayaran' => Pembayaran::where('id_mahasiswa', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.pembayaran.create', [
            'list_kategoripembayaran' => KategoriPembayaran::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->request->add(['id_mahasiswa' => auth()->user()->id, 'status' => 'Unpaid']);
        $pembayaran = Pembayaran::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pembayaran->id,
                'gross_amount' => $pembayaran->kategoriPembayaran->harga,
            ),
            'customer_details' => array(
                'first_name' => $pembayaran->mahasiswa->nama,
                'last_name' => '',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $pembayaran->snap_token = $snapToken;
        $pembayaran->save();
        return redirect('mahasiswa/pembayaran')->with('success', 'Pembayaran berhasil ditambahkan, silahkan lunasi pembayaran sebelum waktu pembayaran habis');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('mahasiswa.pembayaran.show', [
            'pembayaran' => $pembayaran
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        Pembayaran::destroy('id', $pembayaran->id);

        return redirect('/mahasiswa/pembayaran')->with('success', 'Pembayaran berhasil dihapus');
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $pembayaran = Pembayaran::find($request->order_id);
                $pembayaran->update(['status' => 'Paid']);
            }
        }
    }
}
