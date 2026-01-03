@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Projets</h1>
    <a href="{{ route('projets.create') }}" class="btn btn-primary">Ajouter un nouveau projet</a>
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Domaine</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projets as $projet)
            <tr>
                <td>{{ $projet->id }}</td>
                <td>{{ $projet->name }}</td>
                <td>{{ $projet->description }}</td>
                <td>{{ optional($projet->parent1)->name }}</td>
                <td>{{ $projet->date_debut }}</td>
                <td>{{ $projet->date_fin }}</td>
                <td>{{ $projet->description }}</td>
                <td>
                    <a href="{{ route('projets.edit', $projet) }}" class="btn btn-warning">Éditer</a>
                    <form action="{{ route('projets.destroy', $projet) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection