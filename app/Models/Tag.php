<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = ['label' , 'color'];

    public function words()
    {
        return $this->belongsToMany(Word::class);
    }

    public function getDate($date, $format = 'd-m-Y')
    {
        return Carbon::create($date)->format($format);
    }
}
