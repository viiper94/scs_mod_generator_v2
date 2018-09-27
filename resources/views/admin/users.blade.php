@extends('admin.layout.admin')

@section('content')

    <div class="row" style="width: 100%;">
        <div class="col s12 m10 offset-m1">
            <div class="card-panel search">
                <form method="get">
                    <div class="input-field no-margin">
                        <i class="material-icons prefix">search</i>
                        <input type="search" name="q" placeholder="Шукати користувача">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" style="width: 100%;">
        @foreach($users as $user)
            <div class="col s12 m10 offset-m1">
                <div class="card horizontal hoverable">
                    <div class="card-image no-img_horizontal"
                         style="background-image: url(/images/users/{{$user->image ? $user->image : 'default.jpg'}} );">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <a href="{{ route('profile') .'/'. $user->id }}"><h5 class="card-title">{{ $user->name }}</h5></a>
                            <p>E-Mail: {{ $user->email }}</p>
                            <p>Зареестрований: {{ $user->created_at }}</p>
                            @if($user->steamid64)
                                <p>Steam ID:
                                    <a href="http://steamcommunity.com/profiles/{{ $user->steamid64 }}" target="_blank" class="yellow-text text-darken-3">
                                        {{ $user->steamid64 }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection