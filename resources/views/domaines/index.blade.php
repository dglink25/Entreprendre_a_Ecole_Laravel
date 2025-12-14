<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800">
                Domaines du module EAE
            </h2>

            <a href="{{ route('domaines.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Ajouter un domaine
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        @if ($domaines->count() == 0)
            <div class="p-6 bg-white rounded-xl shadow text-center text-gray-600">
                Aucun domaine enregistré.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($domaines as $domaine)
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            {{ $domaine->nom }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($domaine->description, 100) }}
                        </p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('domaines.edit', $domaine->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                Modifier
                            </a>

                            <form action="{{ route('domaines.destroy', $domaine->id) }}" method="POST"
                                  onsubmit="return confirm('Supprimer ce domaine ?')">
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

</x-app-layout>
