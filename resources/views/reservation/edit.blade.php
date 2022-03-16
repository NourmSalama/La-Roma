<x-nav>
    <div class="row">
        <div class="col-sm-8 offset-sm-2 mt-5">
            <h1 class="display-3">Edit Reservation</h1>

            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

                <form method="POST" action="{{ route('reservation.update', $reservation->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Customer name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $reservation->customer->name }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="email">Customer email:</label>
                        <input type="email" class="form-control" name="email" value="{{ $reservation->customer->email }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="phone">Customer Phone:</label>
                        <input type="phone" class="form-control" name="phone" value="{{ $reservation->customer->phone }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="name">Customer comments:</label>
                        <input type="text" class="form-control" name="comments" value="{{ $reservation->comments }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="allergies">Customer allergies:</label>
                        <input type="text" class="form-control" name="allergies" value="{{ $reservation->allergies }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="datetime-local" class="form-control" name="date" value="{{ date('Y-m-d\TH:i', strtotime($reservation->date)) }}" required/>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3"  onclick="return confirm('Are you sure you want to update this reservation ?')">Update Reservation</button>
                </form>
            </div>
        </div>
    </div>
</x-nav>
