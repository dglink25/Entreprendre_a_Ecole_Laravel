@extends('layouts.app')

@section('title', 'Créer un Domaine - Module EAE')

@section('content')

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800">Projets</h2>

            <a href="{{ route('projets.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow transition">
                + Ajouter un projet
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4">

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        @if($projets->count() == 0)
            <div class="p-6 bg-white rounded-xl shadow text-center text-gray-600">
                Aucun projet enregistré.
            </div>
        @else

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($projets as $projet)
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $projet->nom }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-3">
                            {{ Str::limit($projet->description, 100) }}
                        </p>

                        <p class="text-xs text-gray-500 mb-4">
                            <b>Début:</b> {{ $projet->date_debut }} <br>
                            <b>Fin:</b> {{ $projet->date_fin }}
                        </p>

                        <div class="flex justify-between">

                            <a href="{{ route('projets.edit', $projet->id) }}"
                                class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                Modifier
                            </a>

                            <form action="{{ route('projets.destroy', $projet->id) }}" method="POST"
                                  onsubmit="return confirm('Supprimer ce projet ?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                    Supprimer
                                </button>
                            </form>

                        </div>

                    </div>
                @endforeach

            </div>

        @endif

    </div>

@endsection
