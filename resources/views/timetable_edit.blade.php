@extends('layouts.navigation')
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          </div>
    <div class="container">
        @if ($message == "Successful")
        <div class="uk-alert-success" uk-alert>
             <a class="uk-alert-close" uk-close></a>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
        @elseif($message == "error")
        <div class="uk-alert-danger" role="alert" ukalert>
            Error {{$message}}
        </div>
        @else
        
        @endif
    </div>
    <div class="uk-container">
        @isset($timetable)
        @foreach($timetable as $d)
        <form method="POST" action="{{ route('edit_timetable', $d->id) }}">
        @csrf
        <fieldset class="uk-fieldset">
        <legend class="uk-legend">Redaguoti/Sukurti treniruotę</legend>
        <div class="uk-margin">
        <select name="week_day" class="uk-select">
            <option>Pirmadienis</option>
            <option>Antradienis</option>
            <option>Trečiadienis</option>
            <option>Ketvirtadienis</option>
            <option>Penktadienis</option>
            <option>Šeštadienis</option>
            <option>Sekmadienis</option>
        </select>
        </div>
        <div class="uk-margin">
        <input type="text" placeholder="Treniruotė prasideda nuo (valanda:minutės)" class="uk-input" name="time_from" value="{{$d->time_from}}">
         <input type="text" placeholder="Treniruotė baigiasi (valanda:minutės)" class="uk-input" name="time_to" value="{{$d->time_to}}">
        </div>
        @endforeach
        <div class="uk-margin">
        <button class="uk-button uk-button-primary" type="submit" @click="search()" v-if="!loading">Patvirtinti</button>
        </div>
        </div>
        </fieldset>
        </form>
        @endisset
       
    
</div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>
@endsection