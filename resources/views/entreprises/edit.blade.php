@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Éditer l'entreprise</h1>
    <form method="POST" action="{{ route('entreprises.update', $entreprise) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $entreprise->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $entreprise->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="domaine_id">Domaine</label>
            <select name="domaine_id" id="domaine_id" class="form-control">
                @foreach ($domaines as $domaine)
                <option value="{{ $domaine->id }}" {{ $entreprise->parent1_id == $domaine->id ? 'selected' : '' }}>{{ $domaine->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection