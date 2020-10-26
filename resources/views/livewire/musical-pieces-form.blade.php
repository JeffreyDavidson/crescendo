<form method="POST" action="#" wire:submit.prevent="postMusicPiece">
    <div class="mt-5 card card-custom">
        <div class="card-header">Add Musical Piece Form</div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" wire:model.defer="title">
                @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="composer">Composer</label>
                <select id="composerSelect" name="composer" class="form-control" multiple wire:model.defer="selectedComposers">
                    @foreach($composers as $composer)
                        <option value="{{ $composer->id }}">{{ $composer->name }}</option>
                    @endforeach
                </select>
                @foreach ($composerInputs as $key => $value)
                    <div class="mt-2 d-flex">
                        <input type="text" class="form-control" id="composerInput-{{$key+1}}" wire:model="composerInputs.{{ $key }}.name">
                        <button class="btn btn-danger" wire:click.prevent="removeComposerInput({{$key}})">remove</button>
                    </div>
                @endforeach
                <button type="button" class="mt-2 btn btn-primary" wire:click.prevent="addComposer({{$i}})">+ Add Additional Composer</button>
            </div>
            <div class="form-group">
                <label for="arranger">Arranger</label>
                <select id="arrangerSelect" name="arranger" class="form-control" multiple wire:model.defer="selectedArrangers">
                    @foreach ($arrangers as $arranger)
                        <option value="{{ $arranger->id }}">{{ $arranger->name }}</option>
                    @endforeach
                </select>
                @foreach ($arrangerInputs as $key => $value)
                    <div class="mt-2 d-flex">
                        <input type="text" class="form-control" id="arrangerInput-{{$j+1}}" wire:model="arrangerInputs.{{ $key }}.name">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="removeArrangerInput({{$key}})">remove</button>
                    </div>
                @endforeach
                <button type="button" class="mt-2 btn btn-primary" wire:click.prevent="addArranger({{$j}})">+ Add Additional Arranger</button>

            </div>
            <div class="form-group">
                <label for="instrumentations">Instrumentations</label>
                <div class="form-row">
                    <div class="col-12">
                        @foreach ($instruments as $instrument)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" value="{{ $instrument->id }}" wire:model.defer="selectedInstruments.{{ $instrument->id }}">
                                <label class="form-check-label">{{ $instrument->name }}</label>
                            </div>
                        @endforeach
                        @foreach ($instrumentInputs as $key => $value)
                            <div class="mt-2 d-flex">
                                <input type="text" class="form-control" id="instrumentInput-{{$k+1}}" wire:model.defer="instrumentInputs.{{ $key }}.name">
                                <button class="btn btn-danger btn-sm" wire:click.prevent="removeInstrumentInput({{$key}})">remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="mt-2 btn btn-primary" wire:click.prevent="addInstrument({{$k}})">+ Add Additional Instrument</button>
                </div>
                @error('selectedInstruments') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            @if ($category->hasARange())
                <div class="form-group">
                    <label>Range</label>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="minimumInput">Minimum</label>
                            <input type="text" class="form-control" id="minimumInput" wire:model.defer="minimumOctaves">
                            @error('minimumOctaves') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6">
                            <label for="maaximumInput">Maximum</label>
                            <input type="text" class="form-control" id="maximumInput" wire:model.defer="maximumOctaves">
                            @error('maximumOctaves') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
