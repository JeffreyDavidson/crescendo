<?php

namespace Database\Seeders;

use App\Arranger;
use App\Category;
use App\Composer;
use App\Instrument;
use App\MusicPiece;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = [
        'musical_pieces',
        'composers',
        'arrangers',
        'instruments',
        'composer_music_piece',
        'arranger_music_piece',
        'instrument_music_piece',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (Category::count() == 0) {
            Category::create(['name' => 'Flute', 'slug' => 'flute']);
            Category::create(['name' => 'Piano', 'slug' => 'piano']);
            Category::create(['name' => 'Hand Bells', 'slug' => 'hand-bells']);
        }

        Model::unguard();

        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        MusicPiece::factory()
                ->has(Composer::factory()->count(3))
                ->has(Arranger::factory()->count(3))
                ->has(Instrument::factory()->count(3))
                ->count(50)
                ->create(['category_id' => Category::inRandomOrder()->first()->id]);

        Model::reguard();
    }
}
