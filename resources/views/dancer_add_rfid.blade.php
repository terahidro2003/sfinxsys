@extends('layouts.navigation')
@section('content')

<div class="uk-margin">
	 <div class="uk-container uk-card uk-card-default uk-card-body uk-width-1-2@m uk-position-center">
	 	@foreach($dancer as $data)
            <h2 class="uk-card-title">Šokėjo ID: {{$data->id}}</h2>

           <div id="newrfid">
           <template></template>
           </div>

            </h2>
             @endforeach  
            <p>Laukiama, kol RFID kortelė bus pridėta prie skaitytuvo</p>
        </div>
</div>
@endcontent