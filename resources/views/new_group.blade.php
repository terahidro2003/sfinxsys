@extends('layouts.navigation')
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
          </div>
    <div class="container">
        @if ($message == "Succsessful")
         <div class="uk-card uk-card-primary uk-card-body uk-width-1-2@m uk-align-center">
            <a class="uk-alert-close" uk-close></a>
            <h3 class="uk-card-title">Grupė sukurta sėkmingai!</h3>
        </div>
        
        @elseif($message == "")
        @else
        <div class="uk-alert-danger" role="alert" ukalert>
            Klaida {{$message}}
        </div>

        @endif
    </div>
    <div class="uk-container uk-card uk-card-default uk-card-body">
        <form method="POST" action="{{ action('GroupsController@store') }}">
        @csrf
        <fieldset class="uk-fieldset">
        <legend class="uk-legend">Pridėti grupę</legend>
        <div class="uk-margin">
        <input type="text" placeholder="Grupės pavadinimas" class="uk-input" name="name">
        </div>
        <div class="uk-margin">
        <input type="text" placeholder="Grupės treneris" class="uk-input" name="leader">
        </div>
        <div class="uk-margin">
        <button class="uk-button uk-button-primary" type="submit" @click="search()" v-if="!loading">Sukurti</button>
        </div>
        </div>
    </fieldset>
        </form>



</div>
    </div>
</main>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
</body>
</html>
