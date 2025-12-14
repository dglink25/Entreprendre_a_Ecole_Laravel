<x-app-layout>

    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">Ajouter un domaine</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6 px-4">

        {{-- Errors --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg shadow">
                <ul class="ms-4 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-xl shadow">

            <form action="{{ route('domaines.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 mb-1">Nom</label>
                    <input type="text" name="nom"
                           class="w-full border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full border-gray-300 rounded-lg"></textarea>
                </div>

                <button
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Enregistrer
                </button>
            </form>

        </div>

    </div>

</x-app-layout>
