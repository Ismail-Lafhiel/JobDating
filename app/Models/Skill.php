<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable =['skill_name'];
    public function users()
    {
        return $this->morphedByMany(User::class, 'skillable');
    }

    public function announcements()
    {
        return $this->morphedByMany(Announcement::class, 'skillable');
    }
}
