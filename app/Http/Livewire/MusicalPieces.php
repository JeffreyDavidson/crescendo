<?php

namespace App\Http\Livewire;

use App\MusicPiece;
use Livewire\Component;
use Livewire\WithPagination;

class MusicalPieces extends Component
{
    use WithPagination;

    public $search = '';
    public $category = 1;

    protected $paginationTheme = 'bootstrap';

    public function __construct($category = null)
    {
        $this->category = $category;
    }

    /**
     *  Livewire Lifecycle Hook
     */
    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $musicalPieces = MusicPiece::query()
                                ->where('category_id', $this->category)
                                ->search('title', $this->search)
                                ->searchRelationship('composers', 'name', $this->search)
                                ->searchRelationship('arrangers', 'name', $this->search)
                                ->searchRelationship('instruments', 'name', $this->search)
                                ->with('composers', 'arrangers', 'instruments')
                                ->orderBy('title')
                                ->paginate(10);

        return view('livewire.musical-pieces', [
            'musicalPieces' => $musicalPieces
        ]);
    }
}
