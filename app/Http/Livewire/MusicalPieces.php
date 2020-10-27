<?php

namespace App\Http\Livewire;

use App\MusicPiece;
use Livewire\Component;
use Livewire\WithPagination;

class MusicalPieces extends Component
{
    use WithPagination;

    public $search = '';
    public $category;
    public $minimumOctaves;
    public $maximumOctaves;

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

    /**
     *  Livewire Lifecycle Hook
     */
    public function updatingMinimumOctaves(): void
    {
        $this->gotoPage(1);
    }

    /**
     *  Livewire Lifecycle Hook
     */
    public function updatingMaximumOctaves(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $musicalPieces = MusicPiece::query()
                                ->search('category_id', $this->category->id)
                                ->search('title', $this->search)
                                ->searchRelationship('composers', 'name', $this->search)
                                ->searchRelationship('arrangers', 'name', $this->search)
                                ->searchRelationship('instruments', 'name', $this->search)
                                ->search('minimum_octaves', $this->minimumOctaves)
                                ->search('maximum_octaves', $this->maximumOctaves)
                                ->with('composers', 'arrangers', 'instruments')
                                ->orderBy('title')
                                ->paginate(10);

        return view('livewire.musical-pieces', [
            'musicalPieces' => $musicalPieces
        ]);
    }
}
