<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\Pembayaran;

class ServiceApiController extends Controller
{
    // Pelanggan API
    public function getPelanggan() {
        return response()->json(['status' => 'success', 'data' => Pelanggan::all()]);
    }
    public function postPelanggan(Request $request) {
        $data = Pelanggan::create($request->all());
        return response()->json(['status' => 'created', 'data' => $data], 201);
    }

    // Kendaraan API
    public function getKendaraan() {
        return response()->json(['status' => 'success', 'data' => Kendaraan::all()]);
    }
    public function postKendaraan(Request $request) {
        $data = Kendaraan::create($request->all());
        return response()->json(['status' => 'created', 'data' => $data], 201);
    }

    // Daftar Service API
    public function getDaftarService() {
        return response()->json(['status' => 'success', 'data' => DaftarService::with(['pelanggan', 'kendaraan'])->get()]);
    }
    public function postDaftarService(Request $request) {
        $data = DaftarService::create($request->all());
        return response()->json(['status' => 'created', 'data' => $data], 201);
    }

    // Data Service API
    public function getDataService() {
        return response()->json(['status' => 'success', 'data' => DataService::with('daftarService')->get()]);
    }
    public function postDataService(Request $request) {
        $data = DataService::create($request->all());
        return response()->json(['status' => 'created', 'data' => $data], 201);
    }

    // Pembayaran API
    public function getPembayaran() {
        return response()->json(['status' => 'success', 'data' => Pembayaran::with('daftarService')->get()]);
    }
    public function postPembayaran(Request $request) {
        $data = Pembayaran::create($request->all());
        return response()->json(['status' => 'created', 'data' => $data], 201);
    }
}
