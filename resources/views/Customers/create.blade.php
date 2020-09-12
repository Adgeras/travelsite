@extends('layouts.app')
@section('title', 'Create Customer')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurkime klientą:</div>
               <div class="card-body">
                   <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>E-mail: </label>
                            <input type="text" name="email" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Telefonas: </label>
                            <input placeholder="8XXX XXXXX" type="text" name="phone" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Keliaus į: </label>
                            <select name="country_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite šalį</option>
                                 @foreach ($countries as $country)
                                 <option value="{{ $country->id }}">{{ $country->title }}</option>
                                 @endforeach
                            </select>
                        </div>
                       <button type="submit" class="btn btn-primary">Išsaugoti</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection