<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class File extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'path',
        'extension',
        'type'
    ];

    

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_file', 'file_id', 'campaign_id')
                    ->withPivot('id')
                    ->using(CampaignFile::class);
    }

    /**
     * Get all of the owning fileable models.
     */
    public function fileable()
    {
        return $this->morphTo();
    }

    /**
     * Get the journal articles associated with the file.
     */
    public function journalArticles()
    {
        return $this->morphedByMany(JournalArticle::class, 'fileable');
    }

    // Automatically generate UUIDs for new records
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
