@extends('layouts.navigation')
 <main role="main" style="margin-top: 1%;" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Grupės</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
                <a href="{{route('group_add')}}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Pridėti grupę
                </a>
              </div>
            </div>
          </div>
    <ul class="uk-breadcrumb">
    <li><a href="{{route('home')}}">Pagrindinis</a></li>
    <li><span>Grupės</span></li>
    </ul>
    <div class="uk-container uk-container-large uk-overflow-auto">
      <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@l">
        <div>
          <div class="uk-card uk-card-default" style="background-color: white;">               
        <div class="uk-card-body">
        <table class="uk-table uk-table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Grupės pavadinimas</th>
            <th>Pask. kartą atnaujinta</th>
            <th>Treneris</th>
            <th>Narių skaičius</th>
            <th>Nariai</th>
            <th>Redaguoti</th>
          </tr>
        </thead>
        <tbody>
            @foreach($groups_data as $data)
          <tr>
            <td>{{$data->id}}</td>
            <td class="table-bolded">{{$data->name}}</td>
            <td>{{$data->updated}}</td>
            <td>{{$data->leader}}</td>
            <td>{{$data->members_count}}</td>
            <td><a class="uk-link" href="{{route('view_group_members', $data->name)}}">Peržiūrėti narių sąrašą</a></td>  
            <td><a class="uk-link" href="{{route('edit_group', $data->id)}}">Redaguoti</a></td>  
            <td><a href="{{route('show_current_group_timetable', $data->id)}}" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        Grupės tvarkaraščiai
                    </a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

</main>

<script type="text/javascript">
    document.getElementById("groups-menu-item").style.color = "#f0386b";
</script>
<script type="text/javascript">
  function add_group(){
     alert("Hello! I am an alert box!!");
     swal({
    text: 'Grupės pavadinimas',
    content: "input",
    button: {
      text: 'Patvirtinti',
      closeModal: true,
    }
  });
}
 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>

