<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Barang;

use Illuminate\Support\Facades\Auth;


class PemesananController extends Controller
{
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'id_barang' => '',
                'id_transaksi' => 'required',
                'tanggalAkhirReservasi' => 'required',
                'nama' => 'required|string|max:255',
                'noTelepon' => 'required|string|max:255',
                'identitas' => 'required',
                'metode' => 'required|string|max:255',
                'location' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',

            ]);

            
            $idPelanggan = Auth::user()->idUser;
            
            // dd($idPelanggan);

            $transaksi = Reservasi::create([
                'idPelanggan' => $idPelanggan,
                'idMobil' => $request->idMobil,
                'tanggalPemesanan' => now(),
                'tanggalStartReservasi' => $request->tanggalStartReservasi,
                'tanggalAkhirReservasi' => $request->tanggalAkhirReservasi,
                'nama' => $request->nama,
                'noTelepon' => $request->noTelepon,
                'identitas' => $request->identitas,
                'metode' => $request->metode,
                'location' => $request->location,
                'email' => $request->email,
            ]);

            $user = Auth::user();

            $cars = Mobil::find($transaksi->idMobil);

            $bookings = collect([
                'users' => $user,
                'mobil' => $cars,
                'transaksi' => $transaksi,
            ]);

            // dd($bookings);
            return view('sewa/booking', compact('bookings'));
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withErrors($e);
        }
    }

    public function show(Request $request)
    {
        $carData = $request->only([
            'car_id',
            'car_name',
            'car_seats',
            'car_transmission',
            'car_price',
            'car_image',
        ]);

        return view('sewa.transaksiReservasi', compact('carData'));
    }
}
