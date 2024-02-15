<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Log;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        "title", "description", "announcement_img", "company_id"
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function skills()
    {
        return $this->morphToMany(Skill::class, 'skillable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'applications')->withTimestamps();
    }

    public function calculateSkillMatchPercentage($user, $threshold = 60)
    {
        if ($user && $user->skills && $user->skills->count() > 0) {
            $userSkills = $user->skills->pluck('id')->toArray();
            $announcementSkills = $this->skills->pluck('id')->toArray();

            $commonSkillsCount = count(array_intersect($userSkills, $announcementSkills));
            $totalSkillsCount = count($announcementSkills);

            $matchPercentage = $totalSkillsCount > 0 ? ($commonSkillsCount / $totalSkillsCount) * 100 : 0;
            $isMatchAboveThreshold = $matchPercentage >= $threshold;

            return [
                'matchPercentage' => $matchPercentage,
                'isMatchAboveThreshold' => $isMatchAboveThreshold,
            ];
        }
        return [
            'matchPercentage' => 0,
            'isMatchAboveThreshold' => false,
        ];
    }
}
