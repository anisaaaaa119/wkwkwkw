<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
{
    $totalBarang = Barang::count(); // total semua barang
    $barangBaik = Barang::where('kondisi', 'baik')->count(); // barang kondisi baik
    $barangRusak = Barang::where('kondisi', 'rusak')->count(); // barang rusak

    return view('admin.dashboard', compact('totalBarang', 'barangBaik', 'barangRusak'));
}
}
