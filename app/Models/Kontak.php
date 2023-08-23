<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $guarded = ['id'];


    // API ---------------------------------------------------------

    public function apiAllPesan() {
        $query = Kontak::select('*')->orderBy('created_at', 'DESC');
        $perPage = request('per_page', 10);
        $page = request('page', 1);
        $offset = ($page - 1) * $perPage;
        return $query->offset($offset)->limit($perPage)->get();
    }

}
