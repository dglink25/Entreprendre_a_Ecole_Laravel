@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Domaines</h1>
    <a href="{{ route('domaines.create') }}" class="btn btn-primary">Ajouter un nouveau domaine</a>
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($domaines as $domaine)
            <tr>
                <td>{{ $domaine->id }}</td>
                <td>{{ $domaine->name }}</td>
                <td>{{ $domaine->description }}</td>
                <td>
                    <a href="{{ route('domaines.edit', $domaine) }}" class="btn btn-warning">Éditer</a>
                    <form action="{{ route('domaines.destroy', $domaine) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce domaine ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection