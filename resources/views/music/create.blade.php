@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <livewire:musical-pieces-form :category="$category" />
            </div>
        </div>
    </div>
@endsection
