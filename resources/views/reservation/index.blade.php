<x-nav>
    <body>
    <link href="{{ asset('css/reservationpanel.css') }}" rel="stylesheet">
        @if(session()->get('success'))
            <div id="showMe" class="alert alert-success" >
                {{ session()->get('success') }}
            </div>
        @endif
    <div class="row">
        @foreach($reservations as $reservation)
                <div class="bg-white rounded justify-content-md-center py-5 px-4 col-4" align="center">
                    <img src="https://toppng.com/uploads/preview/instagram-default-profile-picture-11562973083brycehrmyv.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">{{ $reservation->customer->name }}</h5><br>
                    <span class="small text-uppercase text-muted">Reservatie datum: {{ $reservation->date}}</span><br>
                    <span class="small text-uppercase text-muted">Klant allergieën: {{ $reservation->allergies}}</span><br>
                    <span class="small text-uppercase text-muted">Opmerkingen: {{ $reservation->comments}}</span><br>
                    <ul class="social mb-0 list-inline mt-3">
                        <a href="{{ route('reservation.edit',$reservation->id) }}" class="btn btn-primary mt-2">Edit</a>
                        <a href="/order/{{ $reservation->id }}" class="btn btn-primary mt-2">Order for this table</a>
                        <form onsubmit="return confirm('Are you sure you want to DELETE this reservation ? (This is not revertable)!')"
                            action="{{ route('reservation.destroy', $reservation->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            </ul>
                        </form>
                    </ul>
                </div>
        @endforeach
    </div>
    </body>
</x-nav>




<style>
    body {
        margin-top: 10rem;
    }
</style>
