@extends('layouts.navigation')
@section('content')
   
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            @foreach($group_data as $data)
            <h1 class="h2">Grupės <b>{{$data->name}}</b> nariai</h1>
            @endforeach
          </div>
           @if($errors->any())
        @if($errors->first() == "success")
       <div class="uk-card uk-card-primary uk-card-body uk-width-1-2@m uk-align-center">
            <a class="uk-alert-close" uk-close></a>
            <h3 class="uk-card-title">Mokęstis sėkmingai priimtas!</h3>
        </div>

        @endif
      @endif
    <div class="uk-container uk-container-large uk-overflow-auto">
      <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@l">
        <div>
          <div class="uk-card uk-card-default" style="background-color: white;">               
        <div class="uk-card-body">
        <table class="uk-table uk-table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Gimimo data</th>
        <th>Likutis</th>
        <th>Mokėjimai</th>
      </tr>
    </thead>
    <tbody>
        @foreach($groups_data as $data)
        @if ($data->credit <= 0)
      <tr style="background-color: #F62DAE; color: white">
        <td>{{$data->id}}</td>
        <td style="font-weight: bold;">{{$data->first_name}}</td>
        <td style="font-weight: bold;">{{$data->last_name}}</td>
        <td>{{$data->birth_date}}</td>
        <td>{{$data->credit}}</td>
        <td><a style="color: white; text-decoration: none; text-transform: uppercase;" href="/payments/pay/{{$data->id}}">Sumoketi</a></td>
      </tr>
      @else
       <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->first_name}}</td>
        <td>{{$data->last_name}}</td>
        <td>{{$data->birth_date}}</td>
        <td>{{$data->credit}}</td>
        <td><a href="/payments/pay/{{$data->id}}">Sumoketi</a></td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>
@endsection