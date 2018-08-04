@extends('layouts.navigation')
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          </div>
          <ul class="uk-breadcrumb">
            <li><a href="{{route('home')}}">Pagrindinis</a></li>
            <li><a href="{{route('groups')}}">Grupės</a></li>
            <li><span>Redaguoti</span></li>
           </ul>
    <div class="container">
        @if ($message == "Succsessful")
        <div class="uk-card uk-card-primary uk-card-body uk-width-1-2@m uk-align-center">
            <a class="uk-alert-close" uk-close></a>
            <h3 class="uk-card-title">Grupės redagavimas sėkmingas!</h3>
        </div>
        @elseif($message == "Error")
        <div class="uk-alert-danger" role="alert" ukalert>
            Klaida {{$message}}
        </div>
        @endif
    </div>
    <div class="uk-container uk-card uk-card-default uk-card-body">
        @foreach($groups_data as $group)
        <form method="POST" action="{{ route('edit_group', $group->id) }}">
        @csrf
        <fieldset class="uk-fieldset">
        
        <legend class="uk-legend">Redaguoti "{{$group->name}}" grupę</legend>
        <div class="uk-margin">
        <input type="text" placeholder="Grupės pavadinimas" class="uk-input" name="name" value="{{$group->name}}">
        </div>
        <div class="uk-margin">
        <input type="text" placeholder="Grupės treneris" class="uk-input" name="leader" value="{{$group->leader}}">
        </div>
        @endforeach
        <div class="uk-margin">
        <button class="uk-button uk-button-primary" type="submit" @click="search()" v-if="!loading">Patvirtinti</button>
        </div>
        </div>
    </fieldset>
        </form>
</div>

<div class="uk-container uk-overflow-auto">
    @foreach($groups_data as $group)
    <legend class="uk-legend">Grupės "{{$group->name}}" nariai</legend>   
    @endforeach
    <table class="uk-table uk-table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Vardas</th>
        <th>Pavarde</th>
        <th>Pradejo lankyti</th>
        <th>Tevu tel. numeris</th>
        <th>Telefono numeris</th>
        <th>Istrinti</th>
      </tr>
    </thead>
    <tbody>
        @foreach($dancers as $data)
      <tr>
        <td>{{$data->id}}</td>
        <td class="table-bolded">{{$data->first_name}}</td>
        <td class="table-bolded">{{$data->last_name}}</td>
        <td>{{$data->created_at}}</td>
        <td>{{$data->parents_phone_number}}</td>
        <td>{{$data->phone_number}}</td>
        <td><a class="uk-link" href="dancers/delete/{{$data->first_name}}">Pašalinti</a></td>  
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>
@endsection