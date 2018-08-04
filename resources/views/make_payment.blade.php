@extends('layouts.navigation')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            @foreach($dancer_data as $data)
              <h1 class="h2">Apmokejimas ({{$data->first_name}} {{$data->last_name}})</h1>
            @endforeach
          </div>
    <div class="container">
       @foreach($dancer_data as $data)
    <form method="POST" action="{{ route('member.paid', ['dancer_id' => $data->id]) }}">
        @csrf
        <div class="input-group">
       <input class="form-control" type="numbers" name="money" placeholder="Suma eurais" value="30">
       <button class="btn" type="submit">Patvirtinti</button>
        </div>
   </form>
   @endforeach
    </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>
@endsection