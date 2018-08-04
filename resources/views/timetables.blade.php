@extends('layouts.navigation')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Treniruočių grafikai</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
               
              
              </div>
            </div>
          </div>
      <div class="uk-overflow-auto">
      <div class="limiter">
      <div class="wrap-table100">
        <div class="table100 ver6 m-b-110">
          <table data-vertable="ver6">
            <thead>
              <tr class="row100 head">
                <th class="column100 column1" data-column="column1"></th>
                <th class="column100 column3" data-column="column3">Pirmadienis</th>
                <th class="column100 column4" data-column="column4">Antradienis</th>
                <th class="column100 column5" data-column="column5">Trečiadienis</th>
                <th class="column100 column6" data-column="column6">Ketvirtadienis</th>
                <th class="column100 column7" data-column="column7">Penktadienis</th>
                <th class="column100 column8" data-column="column8">Šeštadienis</th>
                <th class="column100 column2" data-column="column2">Sekmadienis</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($group_data as $group)
                <tr class="row100">
                  <td class="column100 column1" data-column="column1">{{$group->name}}</td>
                  @forelse ($current_timetable->where('group_id', $group->id)->where('week_day', 'Monday') as $timetable)
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">{{ $timetable->time_from }}</td>
                  @empty
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">--</td>
                  @endforelse

                  @forelse ($current_timetable->where('group_id', $group->id)->where('week_day', 'Tuesday') as $timetable)
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">{{ $timetable->time_from }}</td>
                  @empty
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">--</td>
                  @endforelse
                  
                   @forelse ($current_timetable->where('group_id', $group->id)->where('week_day', 'Wednesday') as $timetable)
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">{{ $timetable->time_from }}</td>
                  @empty
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">--</td>
                  @endforelse

                   @forelse ($current_timetable->where('group_id', $group->id)->where('week_day', 'Thursday') as $timetable)
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">{{ $timetable->time_from }}</td>
                  @empty
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">--</td>
                  @endforelse

                   @forelse ($current_timetable->where('group_id', $group->id)->where('week_day', 'Friday') as $timetable)
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">{{ $timetable->time_from }}</td>
                  @empty
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">--</td>
                  @endforelse

                   @forelse ($current_timetable->where('group_id', $group->id)->where('week_day', 'Saturday') as $timetable)
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">{{ $timetable->time_from }}</td>
                  @empty
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">--</td>
                  @endforelse

                   @forelse ($current_timetable->where('group_id', $group->id)->where('week_day', 'Sunday') as $timetable)
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">{{ $timetable->time_from }}</td>
                  @empty
                   <td class="column100 column2" data-column="column{{$loop->iteration}}">--</td>
                  @endforelse
                </tr>
              @endforeach
              <!-- TEST ROW ---
              <tr class="row100">
                <td class="column100 column1" data-column="column1">Sfinx Squad</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr>
            -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>