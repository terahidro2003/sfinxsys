@extends('layouts.navigation')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          </div>
          @if($errors->any())
        @if($errors->first() == "success")
      <div class="uk-card uk-card-primary uk-card-body uk-width-1-2@m uk-align-center">
            <a class="uk-alert-close" uk-close></a>
            <h3 class="uk-card-title">Mokęstis sėkmingai priimtas!</h3>
        </div>

        @endif
      @endif
        <div class="uk-container-large uk-card uk-card-default uk-card-body">
        @foreach($request_data as $data)
        <form method="post" action="{{ action('DancersController@update', ['dancer_id' => $data->id]) }}">
        <fieldset class="uk-fieldset">
        <legend class="uk-legend">Duomenys apie šokėją</legend>
        @csrf
        <div class="">
        <div class="uk-margin">
        <input class="uk-input" type="text" name="first_name" placeholder="name" value="{{$data->first_name}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="last_name" placeholder="last name" value="{{$data->last_name}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="facebook" name="facebook" placeholder="El. pašto adresas" value="{{$data->facebook}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="birth_date" placeholder="Gimimo data" value="{{$data->birth_date}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="phone" placeholder="phone number" value="{{$data->phone_number}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="parents_phone" placeholder="parents phone number" value="{{$data->parents_phone_number}}">
        </div>
        <div class="uk-margin">
        <legend>Kreditas: {{$data->credit}}</legend>
        </div>
        <div class="uk-margin">
        	<a style="text-decoration: none; text-transform: uppercase;" href="/payments/pay/{{$data->id}}">Sumoketi</a>
        </div>
        <!-- here group box must be added!!! -->
        <div class="uk-margin">
        <select name="group_select" class="uk-select">
            @foreach($groups as $group)
            @if ($data->dance_group == $group->name)
            <option value="{{$group->name}}" selected>{{$group->name}}</option>
            @else
            <option value="{{$group->name}}">{{$group->name}}</option>
            @endif
            @endforeach
        </select>
        </div>
        <div class="uk-margin">
         <input class="uk-input" type="number" name="discount" placeholder="Lengvata (jei nėra įrašyti '0')" value="0">
        </div>
        <div class="uk-margin">
        <button class="uk-button uk-button-secondary" type="submit">Patvirtinti</button>
        </div> 
        @endforeach
        </div>
    </fieldset>
        </form>
        </div>
  </main>

</body>
</html>
@endsection