@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br/>
@endif

<div class="container">
    <link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
    <div class="left">
        <div class="header">
            <h2 class="animation a1">What are you waiting for ?</h2>
            <h4 class="animation a2">So you could have the best food in town guaranteed !</h4>
        </div>
        <form method="POST" action="{{ route('reservation.store') }}">
            @csrf
            <input type="text" class="form-field animation a3" name="name"  placeholder="name" required/>
            <input type="email" class="form-field animation a3" name="email" placeholder="email" required/>
            <input type="text" class="form-field animation a4" name="phone" placeholder="phone" required/>
            <input type="text" class="form-field animation a4" name="comments" placeholder="comments" required/>
            <input type="text" class="form-field animation a4" name="allergies" placeholder="allergies " required/>
            <input type="datetime-local" class="form-field animation a4" name="date" placeholder="{{ date('Y-m-d H:i:s') }}" required/><br>
            <button type="submit" class="mt-5 animation a6">Confirm reservation</button>
        </form>
    </div>
    <div class="right"></div>
</div>
