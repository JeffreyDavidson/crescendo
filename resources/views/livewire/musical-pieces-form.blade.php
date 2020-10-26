<form method="POST" action="">
    <div class="mt-5 card card-custom">
        <div class="card-header">Add Musical Piece Form</div>
        <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="composer">Composer</label>
                    <select id="composerSelect" name="composer" class="form-control" multiple>
                        @foreach($composers as $composer)
                            <option value="{{ $composer->id }}">{{ $composer->name }}</option>
                        @endforeach
                    </select>
                    <input type="checkbox" wire:model="otherComposer" wire-model="otherComposersCount++">Other
                    @if ($otherComposer)
                        @foreach ($otherComposers as $composer)
                            <input type="text" class="form-control" id="composerInput">
                        @endforeach
                        <button type="button" class="mt-2 btn btn-primary" @click.prevent="addComposer">+ Add Additional Composer</button>
                    @endif
                </div>
                <div class="form-group">
                    <label for="arranger">Arranger</label>
                    <select id="arrangerSelect" name="arranger" class="form-control" multiple>
                        @foreach ($arrangers as $arranger)
                            <option value="{{ $arranger->id }}">{{ $arranger->name }}</option>
                        @endforeach
                    </select>
                    <input type="checkbox" wire:model="otherArranger">Other
                    @if ($otherArranger)
                        <input type="text" class="form-control" id="arrangerInput"><button type="button">+</button>
                    @endif
                </div>
                <div class="form-group">
                    <label for="instrumentations">Instrumentations</label>
                    <div class="form-row">
                        <div class="col-12">
                            @foreach ($instruments as $instrument)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" value="{{ $instrument->id }}" name="instrumentations[]>
                                    <label class="form-check-label">{{ $instrument->name }}</label>
                                </div>
                            @endforeach
                            <input type="checkbox" wire:model="otherInstrument">Other
                            @if ($otherInstrument)
                                <input type="text" class="form-control" id="instrumentInput"><button type="button">+</button>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
