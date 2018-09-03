@extends('admin.layout.admin')

@section('content')

    @if($errors->any())
        <div class="row" style="width: 100%;">
            <div class="col s12 m10 offset-m1">
                @include('admin.warning')
            </div>
        </div>
    @endif
    @if(session()->get('success'))
        <div class="row" style="width: 100%;">
            <div class="col s12 m10 offset-m1">
                @include('admin.success')
            </div>
        </div>
    @endif

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
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p>E-Mail: {{ $user->email }}</p>
                            <p>Зареестрований: {{ $user->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection