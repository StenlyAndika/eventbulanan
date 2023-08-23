<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardEvent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.event.index', [
            'title' => 'Data Event',
            'event' => Event::eventAllAdmin()
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.event.create', [
            'title' => 'Tambah Event'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'slug' => 'required|unique:event',
            'tgl' => 'required',
            'jam' => 'required',
            'oleh' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|file'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('upload/event');
        }

        Event::create($validatedData);

        return redirect()->route('home')->with('success', 'Data berhasil disubmit, menunggu validasi admin!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        
    }

    public function set_accept(Event $event)
    {
        $data = [
            'status' => '1',
        ];
    
        Event::where('id', $event->id)->update($data);

        return redirect()->route('admin.event.index')->with('toast_success', 'Data event berhasil divalidasi!');
    }

    public function set_denied(Event $event)
    {
        $data = [
            'status' => '2',
        ];
    
        Event::where('id', $event->id)->update($data);

        return redirect()->route('admin.event.index')->with('toast_success', 'Data event berhasil ditolak!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // dd($event);
        if($event->gambar) {
            Storage::delete($event->gambar);
        }
        Event::destroy($event->id);
        return redirect()->route('admin.event.index')->with('success','Data berhasil dihapus!');
    }
}
