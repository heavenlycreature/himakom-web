<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Blogs extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getExcerptAttribute(){
        $plainText = strip_tags($this->description);
        return Str::words($plainText, 150, '...');
    }
    public function getFormattedPublishAttribute()
    {
        return Carbon::parse($this->created_at)->format('d F, Y');
    }
}
