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
use Illuminate\Foundation\Testing\WithFaker;

class DatabaseSeeder extends Seeder
{
    use WithFaker;

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

        foreach (Category::get() as $category) {
            MusicPiece::factory()
                ->has(Composer::factory()->count(rand(1, 3)))
                ->has(Arranger::factory()->count(rand(1, 3)))
                ->has(Instrument::factory()->count(rand(1, 3)))
                ->count(20)
                ->create([
                    'category_id' => $category->id
                ]);
        }


        Model::reguard();
    }
}
