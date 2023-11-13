<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sewa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getStatusAttribute()
    {
        if ($this->attributes['status'] === 'aktif' && $this->attributes['expired'] < Carbon::now()) {
            return 'diambil';
        }

        return $this->attributes['status'];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
