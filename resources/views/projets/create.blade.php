@extends('layouts.app')

@section('title', 'Créer un Domaine - Module EAE')

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Ajouter un projet
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6 px-4">

        <div class="bg-white p-8 rounded-xl shadow">

            <form action="{{ route('projets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="font-semibold text-gray-700">Nom du projet</label>
                    <input type="text" name="nom" class="mt-1 w-full border rounded-lg px-4 py-2"
                           placeholder="Nom du projet"
                           value="{{ old('nom') }}">
                    @error('nom') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Description</label>
                    <textarea name="description" rows="4" class="mt-1 w-full border rounded-lg px-4 py-2"
                              placeholder="Décrivez le projet...">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Date de début</label>
                    <input type="date" name="date_debut" class="mt-1 w-full border rounded-lg px-4 py-2"
                           value="{{ old('date_debut') }}">
                    @error('date_debut') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Date de fin</label>
                    <input type="date" name="date_fin" class="mt-1 w-full border rounded-lg px-4 py-2"
                           value="{{ old('date_fin') }}">
                    @error('date_fin') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Image (optionnel)</label>
                    <input type="file" name="image" class="mt-1 w-full border rounded-lg px-4 py-2">
                    @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end">
                    <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Enregistrer
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
