@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Entreprises</h1>
    <a href="{{ route('entreprises.create') }}" class="btn btn-primary">Ajouter une nouvelle entreprise</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Domaine</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entreprises as $entreprise)
            <tr>
                <td>{{ $entreprise->id }}</td>
                <td>{{ $entreprise->name }}</td>
                <td>{{ $entreprise->description }}</td>
                <td>{{ optional($entreprise->parent1)->name }}</td>
                <td>
                    <a href="{{ route('entreprises.edit', $entreprise) }}" class="btn btn-warning">Éditer</a>
                    <form action="{{ route('entreprises.destroy', $entreprise) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entreprise ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection