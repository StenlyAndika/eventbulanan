<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Berita::apiAllBerita();

        if($result->count() > 0) {
            return ApiFormatter::response(200, 'success', $result);
        } else {
            return ApiFormatter::response(404, 'failed');
        }
    }

    public function carousel()
    {
        $data = Berita::apiAllBeritaCarousel();

        if($data) {
            return ApiFormatter::response(200, 'success', $data);
        } else {
            return ApiFormatter::response(404, 'failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = Berita::where('slug' ,"=", $slug)->get();

        if($data) {
            return ApiFormatter::response(200, 'success', $data);
        } else {
            return ApiFormatter::response(404, 'failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
