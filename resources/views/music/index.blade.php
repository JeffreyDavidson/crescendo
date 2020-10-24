@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-5 card card-custom">
                    <div class="d-flex justify-content-between card-header">
                        <h4>Musical Works</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Composer</th>
                                    <th scope="col">Arranger</th>
                                    <th scope="col">Instrumentation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Joyful Joyful</td>
                                    <td>Ludwig van Beethoven</td>
                                    <td>Mozart</td>
                                    <td>Flute, Piano, and Violin</td>
                                </tr>
                                <tr>
                                    <td>Joyful Joyful</td>
                                    <td>Ludwig van Beethoven</td>
                                    <td>Mozart</td>
                                    <td>Flute and Piano</td>
                                </tr>
                                <tr>
                                  <td>Joyful Joyful</td>
                                  <td>Ludwig van Beethoven</td>
                                  <td>Mozart</td>
                                  <td>Flute and Piano</td>
                                </tr>
                                <tr>
                                  <td>Joyful Joyful</td>
                                  <td>Ludwig van Beethoven</td>
                                  <td>Mozart</td>
                                  <td>Flute and Piano</td>
                                </tr>
                                <tr>
                                  <td>Joyful Joyful</td>
                                  <td>Ludwig van Beethoven</td>
                                  <td>Mozart</td>
                                  <td>Flute and Piano</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
    </div>
@endsection
