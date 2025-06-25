@extends('layouts.app')

@section('content')
<div class="w-100 " style="width:100%">
    <div class="d-flex justify-content-around flex-wrap">
      
    <div class="card shadow-sm" style="width:400px">
        <img class="card-img-top" src="{{ asset('./patient.png') }}" alt="Card image">
        <div class="card-body">
           <h4 class="card-title">Patients</h4>
    
           <a href="./patienthome" class="btn btn-primary">Gestionnaire</a>
        </div>
    </div>



    <div class="card shadow-sm" style="width:400px">
        <img class="card-img-top" src="{{ asset('./Medecin.png') }}" alt="Card image">
        <div class="card-body">
           <h4 class="card-title">Medecins</h4>
         
           <a href="medecinhome" class="btn btn-primary">Gestionnaire</a>
        </div>
    </div>

    <div class="card shadow-sm" style="width:400px">
        <img class="card-img-top" src="{{ asset('./urgence.png') }}" alt="Card image">
        <div class="card-body">
           <h4 class="card-title">Urgences</h4>
 
           <a href="./urgencehome" class="btn btn-primary">Gestionnaire</a>
        </div>
    </div>

   



</div>
</div>
@endsection
