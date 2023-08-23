<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Kontak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.index', [
            'title' => 'Event Bulanan Kota Sungai Penuh',
            'event' => Event::eventAllHome()
        ]);
    }

    public function kontak(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'wa' => 'required',
            'email' => 'required|email:dns',
            'pesan' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        Kontak::create($validatedData);
        
        return redirect()->route('home')->with('success', 'Pesan anda berhasil disubmit!');
    }

    public function read($slug)
    {
        return view('home.read', [
            'title' => Event::singleevent($slug)->judul,
            'singleevent' => Event::singleevent($slug)
        ]);
    }
}
