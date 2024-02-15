<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IndustryField extends Model
{
    use HasFactory;

    protected $fillable =['industry_field'];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_industry_field', 'industry_field_id', 'company_id');
    }
}
