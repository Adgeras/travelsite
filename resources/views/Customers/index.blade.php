@extends('layouts.app')
@section('title', 'Customers')
@section('content')
<div class="card-body">
    <label>Pasirinkite šalį klientų filtravimui:</label>
    <form class="form-inline" action="{{ route('customers.index') }}" method="GET">
        <select name="country_id" id="" class="form-control">
            <option value="" selected>Visos</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}" 
                @if($country->id == app('request')->input('country_id')) 
                    selected="selected" 
                @endif>{{ $country->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filtruoti</button>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Email</th>
            <th>Telefonas</th>
            <th>Šalis</th>
            <th>Veikmai</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->country['title'] }}</td>
            
            <td>
                <form action={{ 
                        route('customers.destroy', $customer->id) . 
                        ( app('request')->input('country_id') !== '' 
                            ? '?country_id=' . app('request')->input('country_id') 
                            : '' )
                    }} method="POST">
                    <a class="btn btn-success" href={{ route('customers.edit', $customer->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                    <a href="{{ route('customers.travel', $customer->country_id) }}" class="btn btn-primary" role="button">Peržiūrėti kelionę</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection