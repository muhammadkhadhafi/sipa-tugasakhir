<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\WisudaHarga;
use App\Models\Admin\Data\WisudaPembayaran;
use App\Models\Admin\Data\WisudaPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftaranWisudaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisudaPendaftaran = WisudaPendaftaran::where('id_mahasiswa', auth()->user()->id)->first();

        if ($wisudaPendaftaran) {
            $pembayaran = WisudaPembayaran::where('id_pendaftaran', $wisudaPendaftaran->id)->first();
        } else {
            $pembayaran = null;
        }

        return view('mahasiswa.pendaftaranwisuda.index', [
            'pendaftaran' => WisudaPendaftaran::where('id_mahasiswa', auth()->user()->id)->first(),
            'pembayaran' => $pembayaran
        ]);
    }

    public function uploadBerkasPendaftaranWisuda(Request $request)
    {
        $validatedData = $request->validate([
            'berkas_pendaftaran_wisuda' => ['required', 'file', 'max:5000']
        ]);

        if ($request->file('berkas_pendaftaran_wisuda')) {
            if (isset(auth()->user()->wisudaPendaftaran)) {
                Storage::delete(auth()->user()->wisudaPendaftaran->berkas_pendaftaran_wisuda);
                auth()->user()->wisudaPendaftaran->delete();
            }
            $validatedData['berkas_pendaftaran_wisuda'] = $request->file('berkas_pendaftaran_wisuda')->store('admin/data/pendaftaranwisuda');
        }

        $validatedData['id_mahasiswa'] = auth()->user()->id;
        $validatedData['status'] = 1;

        WisudaPendaftaran::create($validatedData);
        return redirect('mahasiswa/pendaftaranwisuda')->with('success', 'Berkas pendaftaran wisuda berhasil disimpan');
    }

    public function pembayaran(Request $request, $pendaftaran)
    {
        // Mengambil objek model pendaftaran wisuda berdasarkan ID
        $pendaftaran = WisudaPendaftaran::find($pendaftaran);

        if ($pendaftaran->pembayaran) {
            WisudaPembayaran::where('id_pendaftaran', $pendaftaran->id)->delete();
        }

        $dataPembayaran = [
            'id_pendaftaran' => $pendaftaran->id,
            'harga' => WisudaHarga::first()->harga,
            'status' => 1
        ];

        $pembayaran = WisudaPembayaran::create($dataPembayaran);

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
                'gross_amount' => $pembayaran->harga,
            ),
            'customer_details' => array(
                'first_name' => $pembayaran->pendaftaran->mahasiswa->nama,
                'last_name' => '',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $pembayaran->snap_token = $snapToken;
        $pembayaran->save();

        return back()->with('success', 'Pembayaran berhasil disimpan, silahkan lunasi pembayaran sebelum waktu pembayaran habis');
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $pembayaran = WisudaPembayaran::find($request->order_id);
                $pembayaran->update(['status' => 2, 'waktu_dibayar' => now()->toDateTimeString()]);
            }
        }
    }
}
