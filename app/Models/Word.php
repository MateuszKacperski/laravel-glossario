<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['term', 'slug', 'definition'];

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function getAbstract()
    {
        $abstract = substr($this->definition, 0, 50) . '...';
        return $abstract;
    }
        
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDate($date, $format = 'd-m-Y')
    {
        return Carbon::create($date)->format($format);
    }
}
