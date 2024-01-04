<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image_path',
    ];


    /**
     * Get all boats
     *
     * @return Boat[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getBoats() {
        return Boat::all();
    }

    /**
     * Get boat by id
     *
     * @param $id
     * @return Boat
     */
    public function getBoat($id) {
        return Boat::find($id);
    }

}
