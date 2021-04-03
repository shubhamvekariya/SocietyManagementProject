<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $table = 'discussion_details';
    protected $fillable = ['title','description'];
    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
