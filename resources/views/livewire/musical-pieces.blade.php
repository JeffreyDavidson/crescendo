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
                <td colspan="4">No records present.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $musicalPieces->links() }}
</div>
