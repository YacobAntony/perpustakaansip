<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\buku;

class penerbit extends Model
{
    use HasFactory;

    protected $table = 'penerbits';

    public function buku(){
        return $this-> hasMany(Buku::class);
    }
}
