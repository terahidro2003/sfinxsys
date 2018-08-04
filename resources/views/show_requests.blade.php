@extends('layouts.navigation')
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Registracijos</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
                <a href="{{route('group_add')}}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Nauja registracija
                </a>
              </div>
            </div>
          </div>
          <ul class="uk-breadcrumb">
            <li><a href="{{route('home')}}">Pagrindinis</a></li>
            <li><span>Registracijos</span></li>
          </ul>
    <div class="uk-container">
      <div class="uk-overflow-auto">
    <table class="uk-table uk-table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Gimimo data</th>
        <th>Telefono numeris</th>
        <th>Tėvų telefono numeris</th>
        <th>Facebook</th>
        <th>Užsiregistravo</th>
        <th>Pridėti prie narių</th>
      </tr>
    </thead>
    <tbody>
        @foreach($signup_requests as $signup_request)
      <tr>
        <td>{{$signup_request->id}}</td>
        <td>{{$signup_request->first_name}}</td>
        <td>{{$signup_request->last_name}}</td>
        <td>{{$signup_request->birth_date}}</td>
        <td>{{$signup_request->phone_number}}</td>
        <td>{{$signup_request->parents_phone_number}}</td>
        <td><a class="btn btn-sm btn-outline-secondary" href="{{$signup_request->facebook}}"><span data-feather="facebook"></span> Facebook</a></td>
        <td>{{$signup_request->created_at}}</td>
        <td><a class="btn btn-sm btn-outline-secondary" href="dancers/add?id={{$signup_request->id}}"><span data-feather="plus"></span> Pridėti prie šokėjų</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>
@endsection