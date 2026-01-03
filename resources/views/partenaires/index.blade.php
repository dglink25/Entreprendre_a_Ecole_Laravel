@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Partenaires</h1>
    <a href="{{ route('partenaires.create') }}" class="btn btn-primary">Ajouter un nouveau partenaire</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partenaires as $partenaire)
            <tr>
                <td>{{ $partenaire->id }}</td>
                <td>{{ $partenaire->name }}</td>
                <td>{{ $partenaire->description }}</td>
                <td>{{ optional($partenaire->parent1)->name }}</td>
                <td>
                    <a href="{{ route('partenaires.edit', $partenaire) }}" class="btn btn-warning">Éditer</a>
                    <form action="{{ route('partenaires.destroy', $partenaire) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection