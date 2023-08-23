<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard Admin',
            'pesan' => Pesan::orderBy('created_at', 'DESC')->limit(10)->get()
        ]);
    }

    public function destroy(Pesan $pesan)
    {
        Pesan::destroy($pesan->id);
        return redirect()->route('admin.dashboard')->with('success','Pesan berhasil dihapus!');
    }
}
