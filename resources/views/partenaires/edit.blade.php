@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Éditer le partenaire</h1>
    <form method="POST" action="{{ route('partenaires.update', $partenaire) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $partenaire->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $partenaire->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="parent1_id">Parent</label>
            <select name="parent1_id" id="parent1_id" class="form-control">
                @foreach ($entreprises as $entreprise)
                <option value="{{ $entreprise->id }}" {{ $partenaire->parent1_id == $entreprise->id ? 'selected' : '' }}>{{ $entreprise->name }} (Entreprise)</option>
                @endforeach
                @foreach ($projets as $projet)
                <option value="{{ $projet->id }}" {{ $partenaire->parent1_id == $projet->id ? 'selected' : '' }}>{{ $projet->name }} (Projet)</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection