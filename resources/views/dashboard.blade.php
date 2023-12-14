<h1>Dashboard</h1>
@foreach ($users as $user)
    <h1>{{$user['name']}}</h1>
    <h2>{{$user['age']}}</h2>

    @if ($user['age']<18)
        <p>Не совершеннолетний</p>
    @endif
    <hr>
@endforeach

<h1>copyright {{date('Y')}}</h1>
