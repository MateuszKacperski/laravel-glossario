<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function getDate($date, $format = 'd-m-Y')
    {
        return Carbon::create($date)->format($format);
    }
}
