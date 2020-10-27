@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-5 card card-custom">
                    <div class="d-flex justify-content-between card-header">
                        <h4>Musical Works</h4>
                        <a href="{{ route('music.create', $category->slug) }}">Add Music Piece</a>
                    </div>
                    <div class="card-body">
                        <livewire:musical-pieces :category="$category" />
                    </div>
                </div>
          </div>
    </div>
@endsection
