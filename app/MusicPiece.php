<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicPiece extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'musical_pieces';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function composers()
    {
        return $this->belongsToMany(Composer::class);
    }

    public function arrangers()
    {
        return $this->belongsToMany(Arranger::class);
    }

    public function instruments()
    {
        return $this->belongsToMany(Instrument::class);
    }
}
