<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'event';
    protected $guarded = ['id'];
    
    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function eventAllHome() {
        return Event::where('status', '1')
                    ->orderBy('tgl', 'DESC')
                    ->paginate(6);
    }

    public function eventAllAdmin() {
        return Event::orderBy('status', 'ASC')
                    ->orderBy('tgl', 'DESC')
                    ->get();
    }

    public function singleevent($slug) {
        return Event::select('*')->where('slug', $slug)->first();
    }
}
