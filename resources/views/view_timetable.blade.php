@extends('layouts.navigation')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<h1 class="h2" style="text-align: center;margin-bottom: 1%;">Treniruočių grafikai - {{$week_day}} ({{$date}})</h1>
            
    <div class="uk-container uk-overflow-auto">

    
    <div>
      @foreach($timetable_info as $data)
    <div class="uk-container uk-overflow-auto">
    <table class="uk-table uk-table-hover">
    <thead>
      <tr>
        <th>Prasideda</th>
        <th>Baigiasi</th>
        <th>Grupes pavadinimas</th>
        <th>Data</th>
        <th>Atejo</th>

      </tr>
    </thead>
    <tbody>
        
      <tr>
        <td>{{$data->time_from}}</td>
        <td>{{$data->time_to}}</td>
        <td>{{$data->group_name}}</td>
        <td class="table-bolded">{{$data->date}}</td>
        <td>{{$data->entered}}</td>
      </tr>
     
    </tbody>
  </table>
</div>
 @endforeach
    </div>
    </div>

</main>

<script type="text/javascript">
    document.getElementById("groups-menu-item").style.color = "#f0386b";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>