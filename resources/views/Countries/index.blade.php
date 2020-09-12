@extends('layouts.app')
@section('title', 'Countries')
@section('content')
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Aprašas</th>
            <th>Atstumas, km</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($countries as $country)
        <tr>
            <td>{{ $country->title }}</td>
            <td>{!! $country->description !!}</td>
            <td>{{ $country->distance }}</td>
            <td>
                <form action={{ route('countries.destroy', $country->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('countries.edit', $country->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('countries.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection