@extends('layouts.navigation')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 uk-margin">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Pridėti šokėją</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
                <a href="{{redirect()->back()}}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="minus"></span>
                    Atšaukti
                </a>
              </div>
            </div>
          </div>
           <ul class="uk-breadcrumb">
            <li><a href="{{route('home')}}">Pagrindinis</a></li>
            <li><a href="{{route('signup_requests')}}">Registracijos</a></li>
            <li><span>Pridėti šokėją</span></li>
           </ul>
        <div class="uk-container uk-card uk-card-default uk-card-body">
        <form method="post" action="{{ action('DancersController@store') }}">
        <fieldset class="uk-fieldset">
        <legend class="uk-legend">Duomenys apie šokėją</legend>

        @foreach($signup_request_data as $signup_request_data)
        @csrf
        <div class="">
        <div class="uk-margin">
        <input class="uk-input" type="text" name="first_name" placeholder="Vardas" value="{{$signup_request_data->first_name}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="last_name" placeholder="Pavardė" value="{{$signup_request_data->last_name}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="facebook" name="facebook" placeholder="Facebook paskyra" value="{{$signup_request_data->facebook}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="birth_date" placeholder="Gimimo data" value="{{$signup_request_data->birth_date}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="phone" placeholder="Telefono numeris" value="{{$signup_request_data->phone_number}}">
        </div>
        <div class="uk-margin">
        <input class="uk-input" type="text" name="parents_phone" placeholder="Tėvų telefono numeris" value="{{$signup_request_data->parents_phone_number}}">
        </div>
        <!-- here group box must be added!!! -->
        <div class="uk-margin">
        <select name="group_select" class="uk-select">
            @foreach($groups as $group)
            <option value="{{$group->name}}">{{$group->name}}</option>
            @endforeach
        </select>
        </div>
        <div class="uk-margin">
         <input class="uk-input" type="number" name="discount" placeholder="Lengvata (jei nėra įrašyti '0')" value="0">
        </div>
        <div class="uk-margin">
        <button class="uk-button uk-button-secondary" type="submit" name="btn-submit">Patvirtinti</button>
        </div> 
        @endforeach
        </div>
    </fieldset>
        </form>
        </div>
  </main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>
