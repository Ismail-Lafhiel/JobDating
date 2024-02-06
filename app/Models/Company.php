<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "industry_field",
        "contact_info",
        "company_img"
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }
    
    public function industry_fields ():BelongsToMany
    {
        return $this->belongsToMany(IndustryField::class, 'company_industry_field', 'company_id', 'industry_field_id');
    }


}
