<div>
    <div class="w-25">
        <input class="form-control" wire:model="search" type="text" placeholder="Search Musical Pieces">
    </div>
    <table class="table mt-4 table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Composer</th>
                <th scope="col">Arranger</th>
                <th scope="col">Instrumentation</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($musicalPieces as $piece)
            <tr>
                <td><b>{{ $piece->title }}</b></td>
                <td>{{ $piece->composers->implode('name', ', ') }}</td>
                <td>{{ $piece->arrangers->implode('name', ', ') }}</td>
                <td>{{ $piece->instruments->implode('name', ', ') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="d-flex align-items-center justify-content-center">
                        <svg height="15" width="15" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="music" class="mr-2 text-black-50 svg-inline--fa fa-music fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M470.38 1.51L150.41 96A32 32 0 0 0 128 126.51v261.41A139 139 0 0 0 96 384c-53 0-96 28.66-96 64s43 64 96 64 96-28.66 96-64V214.32l256-75v184.61a138.4 138.4 0 0 0-32-3.93c-53 0-96 28.66-96 64s43 64 96 64 96-28.65 96-64V32a32 32 0 0 0-41.62-30.49z"></path></svg>
                        <span class="py-4 text-black-50" style="font-size:125%">No musical pieces found...</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $musicalPieces->links() }}
</div>
