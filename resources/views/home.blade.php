@extends('layouts.navigation')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="uk-section">
    <div class="uk-container uk-container-expand">
 <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@l">
 	<h1>Statistika nuo <i>{{$start}}</i> iki <i>{{$end}}</i></h1>
 	<div class="uk-align-center">
            <h3 class="uk-card-title">Studijos balansas:</h3>
            <h1><b>{{$money}}</b> eurų</h1>
    </div>
    <div class="uk-align-center">
            <h3 class="uk-card-title">Pinigų gauta nuo <i>{{$start}}</i> iki <i>{{$end}}</i>:</h3>
            <h1><b>{{$money_current}}</b> eurų</h1>
    </div>
        <div class="uk-align-center">
            <h3 class="uk-card-title">Šiuo metu yra šokėjų:</h3>
            <p>{{$dancers_count}}</p>
        </div>
         <div class="uk-align-center">
            <h3 class="uk-card-title">Skolininkų:</h3>
            <p>{{$deptors_count}}</p>
        </div>
        <div class="uk-align-center">
            <h3 class="uk-card-title">Pravesta treniruočių:</h3>
            <p>{{$trainings_count}}</p>
        </div> 
        <div class="uk-align-center">
            <h3 class="uk-card-title">Nepatvirtintų registracijų:</h3>
            <p>{{$signup_count}}</p>
        </div> 
        <div>
        <div class="uk-card uk-card-default" style="background-color: white;">               
        <div class="uk-card-body uk-overflow-auto">
        <h1>Skolininkai</h1>
        <table class="uk-table uk-table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Grupė</th>
            <th>Skola</th>
            <th>Telefono numeris</th>
            <th>Tėvų telefono numeris</th>
            <th>Redaguoti</th>
          </tr>
        </thead>
        <tbody>
     
          
          	@foreach($deptors as $d)
          	<tr>
            <td>{{$d->id}}</td>
            <td>{{$d->first_name}}</td>
            <td>{{$d->last_name}}</td>
            <td>{{$d->dance_group}}</td>
            <td>{{$d->credit}}</td>
            <td>{{$d->phone_number}}</td>
            <td>{{$d->parents_phone_number}}</td>
            <td><a href="{{route('update_member', ['dancer_id' => $d->id])}}">Redaguoti</a></td>
           @endforeach
          </tr>

        </tbody>
      </table>
      </div>


    </div>
  </div>
</div>
        	    </div>
</div>
</main>

@endsection
