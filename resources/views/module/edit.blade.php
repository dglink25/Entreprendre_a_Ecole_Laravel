<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Modifier le module : {{ $module->nom }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6 px-4">

        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('module.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- Nom --}}
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom', $module->nom) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('nom')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Courte description --}}
                <div>
                    <label for="courte_description" class="block text-sm font-medium text-gray-700">Courte description</label>
                    <textarea name="courte_description" id="courte_description" rows="2"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('courte_description', $module->courte_description) }}</textarea>
                    @error('courte_description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Longue description --}}
                <div>
                    <label for="longue_description" class="block text-sm font-medium text-gray-700">Longue description</label>
                    <textarea name="longue_description" id="longue_description" rows="5"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('longue_description', $module->longue_description) }}</textarea>
                    @error('longue_description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bouton --}}
                <div class="flex justify-end">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow transition">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
