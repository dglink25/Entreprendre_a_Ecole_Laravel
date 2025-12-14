<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800">Module : {{ $module->nom }}</h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4">

        {{-- Informations générales --}}
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold mb-2">Description</h3>
            <p class="text-gray-700 mb-4">{{ $module->longue_description ?? $module->courte_description ?? 'Aucune description disponible.' }}</p>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg text-center">
                    <p class="text-sm text-gray-600">Domaines</p>
                    <p class="font-bold text-xl">{{ $stats['domaines'] }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg text-center">
                    <p class="text-sm text-gray-600">Projets</p>
                    <p class="font-bold text-xl">{{ $stats['projets'] }}</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg text-center">
                    <p class="text-sm text-gray-600">Entreprises</p>
                    <p class="font-bold text-xl">{{ $stats['entreprises'] }}</p>
                </div>
                <div class="bg-purple-100 p-4 rounded-lg text-center">
                    <p class="text-sm text-gray-600">Partenaires</p>
                    <p class="font-bold text-xl">{{ $stats['partenaires'] }}</p>
                </div>
            </div>
        </div>

        {{-- Bouton éditer --}}
        <div class="mb-6">
            <a href="{{ route('module.edit') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow transition">
                Modifier le module
            </a>
        </div>

        {{-- Statistiques détaillées --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Statistiques du module</h3>
            @if($module->statistiques->isEmpty())
                <p class="text-gray-500">Aucune statistique enregistrée.</p>
            @else
                <ul class="space-y-2">
                    @foreach($module->statistiques as $stat)
                        <li class="p-3 border rounded-lg flex justify-between items-center hover:bg-gray-50">
                            <div>
                                <span class="font-semibold">{{ $stat->nom }}</span>
                                <p class="text-sm text-gray-600">{{ $stat->description }}</p>
                            </div>
                            <div class="text-xl font-bold">{{ $stat->nombre }}</div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>
</x-app-layout>
