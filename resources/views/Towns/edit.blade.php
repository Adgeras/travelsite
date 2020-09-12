@extends('layouts.app')
@section('title', 'Edit Town')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime miesto informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('towns.update', $towns->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas: </label>
                            <input type="text" name="title" class="form-control" value="{{ $towns->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Gyventojų skaičius: </label>
                            <input type="number" name="population" class="form-control" value="{{ $towns->population }}">
                        </div>
                        <div class="form-group">
                            <label>Šalis: </label>
                            <select name="country_id" id="" class="form-control">
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($country->id == $towns->country_id) selected="selected" @endif>{{ $country->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection