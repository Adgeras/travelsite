@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Kliento ir jo kelionės detalės</div>
    <div class="card-body">
        <h5>Užsakovas: {{ $customers->name }} {{$customers->surname}}</h5>
        <h5>Telefonas: {{ $customers->phone }}</h5>
        <h5>El. paštas: {{ $customers->email }}</h5>
        <hr>
        <h5>Keliauja į šalį:  {{  $customers->country['title'] }}</h5>
        <h5>Lankytini miestai: </h5>
        <table class="table">
            <tr>
                <th>Miesto pavadinimas</th>
                <th>Populiacija</th>
            </tr>
            {{-- @foreach ($customer->countries->towns as $town)
            <tr>
                <th>{{ $town->title }}</th>
                <th>{{ $town->population }}</th>
            </tr>
            @endforeach --}}
        </table>
    </div>
</div>
@endsection