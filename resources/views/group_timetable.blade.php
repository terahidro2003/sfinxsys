@extends('layouts.navigation')
@section ('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          	@foreach($group_name as $group)
            <h1 class="h2">Grupės {{$group->name}} treniruočių grafikai</h1>
            
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
                <a href="{{route('create_timetable', $group->id)}}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Pridėti treniruotę
                </a>
                @endforeach
              </div>
            </div>
          </div>

<div class="uk-container uk-overflow-auto">
    <table class="uk-table uk-table-hover">
    <thead>
      <tr>
        <th>Savaites diena</th>
        <th>Prasideda</th>
        <th>Baigiasi</th>
        <th>Redaguoti</th>
      </tr>
    </thead>
    <tbody>
        @foreach($timetable_data as $data)
      <tr>
        <td>{{$data->week_day}}</td>
        <td class="table-bolded">{{$data->time_from}}</td>
        <td>{{$data->time_to}}</td>
        <td><a class="uk-link" href="{{route('edit_timetable', $data->id)}}">Redaguoti</a></td>  
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    </div>
</main>
@endsection