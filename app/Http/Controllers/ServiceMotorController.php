<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\Pembayaran;

class ServiceMotorController extends Controller
{
    public function index()
    {
        return view('service_motor', [
            'pelanggans' => Pelanggan::all(),
            'kendaraans' => Kendaraan::all(),
            'daftar_services' => DaftarService::with(['pelanggan', 'kendaraan'])->get(),
            'data_services' => DataService::with('daftarService')->get(),
            'pembayarans' => Pembayaran::with('daftarService')->get(),
        ]);
    }

    public function storePelanggan(Request $request)
    {
        Pelanggan::create($request->all());
        return back()->with('success', 'Data Pelanggan berhasil disimpan!');
    }

    public function storeKendaraan(Request $request)
    {
        Kendaraan::create($request->all());
        return back()->with('success', 'Data Kendaraan berhasil disimpan!');
    }

    public function storeDaftarService(Request $request)
    {
        DaftarService::create($request->all());
        return back()->with('success', 'Daftar Service berhasil disimpan!');
    }

    public function storeDataService(Request $request)
    {
        DataService::create($request->all());
        return back()->with('success', 'Data Service berhasil disimpan!');
    }

    public function storePembayaran(Request $request)
    {
        Pembayaran::create($request->all());
        return back()->with('success', 'Pembayaran Service berhasil disimpan!');
    }
}
