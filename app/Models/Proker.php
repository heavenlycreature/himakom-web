<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class Proker extends Model
{
    protected $fillable = [
        'judul', 'deskripsi'
    ];

    public function getExcerptAttribute(){
        return Str::limit($this->judul, 50, '...');
    }

    use HasFactory;
}
