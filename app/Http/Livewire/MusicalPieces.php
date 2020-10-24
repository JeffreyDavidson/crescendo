<?php

namespace App\Http\Livewire;

use App\Arranger;
use App\Composer;
use App\Instrument;
use App\MusicPiece;
use Livewire\Component;
use Livewire\WithPagination;

class MusicalPieces extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $musicalPieces = MusicPiece::query()
                                ->search('title', $this->search)
                                ->with('composers', 'arrangers', 'instruments')
                                ->orderBy('title')
                                ->paginate(10);

        return view('livewire.musical-pieces', [
            'musicalPieces' => $musicalPieces
        ]);
    }
}
