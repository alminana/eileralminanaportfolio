<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\information;
use App\Models\Image;
class information extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'slogan',
        'position',
        'address',
        'mobile',
        'email',
        'website',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
