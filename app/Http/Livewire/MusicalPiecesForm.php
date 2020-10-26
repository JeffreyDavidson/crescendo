<?php

namespace App\Http\Livewire;

use App\Arranger;
use App\Composer;
use App\Instrument;
use Livewire\Component;

class MusicalPiecesForm extends Component
{
    public $otherComposer = false;
    public $otherArranger = false;
    public $otherInstrument = false;
    public $otherComposers = [];
    public $otherArrangers = [];
    public $otherInstruments = [];

    /**
     * This function will add an empty header value pair
     * causing an extra row to be rendered.
     */
    public function addHeader(): void
    {
        $this->composers[] = ['name' => '', 'value' => ''];
    }

    public function render()
    {
        $composers = Composer::all();
        $arrangers = Arranger::all();
        $instruments = Instrument::all();

        return view('livewire.musical-pieces-form', [
            'composers' => $composers,
            'arrangers' => $arrangers,
            'instruments' => $instruments,
        ]);
    }
}
