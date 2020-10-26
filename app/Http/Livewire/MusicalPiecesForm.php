<?php

namespace App\Http\Livewire;

use App\Arranger;
use App\Category;
use App\Composer;
use App\Instrument;
use App\MusicPiece;
use Livewire\Component;
use Illuminate\Validation\Rule;

class MusicalPiecesForm extends Component
{
    public $category;
    public $title;
    public $selectedComposers;
    public $selectedArrangers;
    public $selectedInstruments;
    public $composerInputs = [];
    public $arrangerInputs = [];
    public $instrumentInputs = [];
    public $i = 1;
    public $j = 1;
    public $k = 1;
    public $minimumOctaves;
    public $maximumOctaves;

    protected function rules()
    {
        $rules = [
            'title' => ['required'],
            'selectedInstruments' => [
                'nullable',
                Rule::requiredIf(function () {
                    return count($this->instrumentInputs) == 0;
                }),
                'array',
            ],
        ];

        if (optional($this->category)->hasARange()) {
            $rules = array_merge($rules, [
                'minimumOctaves' => [
                    'required',
                    'integer',
                    'lte:maximumOctaves',
                ],
                'maximumOctaves' => [
                    'required',
                    'integer',
                    'gte:minimumOctaves',
                ]
            ]);
        }

        return $rules;
    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    /**
     * This function will add an empty composer value pair
     * causing an extra row to be rendered.
     */
    public function addComposer($i): void
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->composerInputs, $i);
    }

    /**
     * This function will add an empty composer value pair
     * causing an extra row to be rendered.
     */
    public function addArranger($j): void
    {
        $j = $j + 1;
        $this->j = $j;
        array_push($this->arrangerInputs, $j);
    }

    /**
     * This function will add an empty composer value pair
     * causing an extra row to be rendered.
     */
    public function addInstrument($k): void
    {
        $k = $k + 1;
        $this->k = $k;
        array_push($this->instrumentInputs, $k);
    }

    public function removeInstrumentInput($i)
    {
        unset($this->instrumentInputs[$i]);
    }

    public function removeArrangerInput($i)
    {
        unset($this->arrangerInputs[$i]);
    }

    public function removeComposerInput($i)
    {
        unset($this->composerInputs[$i]);
    }

    public function postMusicPiece()
    {
        $this->validate();

        $musicalPiece = MusicPiece::create([
            'category_id' => $this->category->id,
            'title' => $this->title,
            'minimum_octaves' => $this->category->hasARange() ? $this->minimumOctaves : 0,
            'maximum_octaves' => $this->category->hasARange() ? $this->maximumOctaves : 0
        ]);

        if ($this->selectedComposers) {
            foreach ($this->selectedComposers as $composer) {
                $musicalPiece->composers()->attach($composer);
            }
        }

        if ($this->selectedArrangers) {
            foreach ($this->selectedArrangers as $arranger) {
                $musicalPiece->arrangers()->attach($arranger);
            }
        }

        if ($this->selectedInstruments) {
            foreach ($this->selectedInstruments as $instrument) {
                $musicalPiece->instruments()->attach($instrument);
            }
        }

        if ($this->composerInputs && count($this->composerInputs) > 0) {
            foreach ($this->composerInputs as $composer) {
                if ($composer['name'] == '') {
                    continue;
                }
                $composer = Composer::create(['name' => $composer['name']]);

                $musicalPiece->composers()->attach([$composer->id]);
            }
        }

        if ($this->arrangerInputs && count($this->arrangerInputs) > 0) {
            foreach ($this->arrangerInputs as $arranger) {
                if ($arranger['name'] == '') {
                    continue;
                }
                $arranger = Arranger::create(['name' => $arranger['name']]);

                $musicalPiece->arrangers()->attach([$arranger->id]);
            }
        }

        if ($this->instrumentInputs && count($this->instrumentInputs) > 0) {
            foreach ($this->instrumentInputs as $instrument) {
                if ($instrument['name'] == '') {
                    continue;
                }
                $instrument = Instrument::create(['name' => $instrument['name']]);

                $musicalPiece->instruments()->attach([$instrument->id]);
            }
        }

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->selectedComposers = [];
        $this->selectedArrangers = [];
        $this->selectedInstruments = [];
        $this->composerInputs = [];
        $this->arrangerInputs = [];
        $this->instrumentInputs = [];
        $this->minimumOctaves = '';
        $this->maximumOctaves = '';
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
