<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $table = 'discussion_details';
    protected $fillable = ['title','description','society_id'];
    public function message()
    {
        return $this->hasMany(Message::class);
    }
    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }
}
