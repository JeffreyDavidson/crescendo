@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="mt-4">
            <h4 class="text-gray-600">Music Pieces</h4>
            <a href="{{ route('music.create') }}">+ Music Pieces</a>
            <div class="mt-6">
              <div class="my-6 overflow-hidden bg-white rounded-md shadow">
                <table class="w-full text-left border-collapse">
                  <thead class="border-b">
                    <tr>
                      <th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-indigo-800">Title</th>
                      <th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-purple-800">Composer</th>
                      <th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-purple-800">Arranger</th>
                      <th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-purple-800">Instrumentation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="hover:bg-gray-200">
                      <td class="px-6 py-4 text-lg text-gray-700 border-b">Joyful Joyful</td>
                      <td class="px-6 py-4 text-gray-500 border-b">Ludwig van Beethoven</td>
                      <td class="px-6 py-4 text-gray-500 border-b">Mozart</td>
                      <td class="px-6 py-4 text-gray-500 border-b">Flute and Piano</td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 text-lg text-gray-700 border-b">Joyful Joyful</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Ludwig van Beethoven</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Mozart</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Flute and Piano</td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 text-lg text-gray-700 border-b">Joyful Joyful</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Ludwig van Beethoven</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Mozart</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Flute and Piano</td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 text-lg text-gray-700 border-b">Joyful Joyful</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Ludwig van Beethoven</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Mozart</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Flute and Piano</td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 text-lg text-gray-700 border-b">Joyful Joyful</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Ludwig van Beethoven</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Mozart</td>
                        <td class="px-6 py-4 text-gray-500 border-b">Flute and Piano</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
@endsection
