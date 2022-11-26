<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','img','f_point','price'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('download_at');
    }
}
