<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MusicalPiece extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'minimum_octaves',
        'maximum_octaves',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'minimum_octaves' => 'integer',
        'maximum_octaves' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function composers(): BelongsToMany
    {
        return $this->belongsToMany(Composer::class);
    }

    public function arrangers(): BelongsToMany
    {
        return $this->belongsToMany(Arranger::class);
    }

    public function instruments(): BelongsToMany
    {
        return $this->belongsToMany(Instrument::class);
    }
}
