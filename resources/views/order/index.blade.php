<x-nav>
    @if(session()->get('success'))
        <div id="showMe" class="alert alert-success" >
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-center">
    <h1>
        {{ $reservation->customer->name }}
    </h1>
    </div>
    <div class="d-flex justify-content-center">
        <h1>
            <button class="btn btn-primary">Finish Order & Print Invoice</button>
        </h1>
    </div>



    <div class="justify-content-center mt-5 row">
        @foreach($products as $product)
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                <div class="card ml-5 mr-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('/images/' . $product->image_path) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->type }}</p>
                        <p class="card-text">${{ $product->price }}</p>
                        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}" >
                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                        <input type="hidden" name="status" value="0">
                        <button type="submit" class="btn btn-danger">Order</button>
                    </div>
                </div>
            </form>
         @endforeach
     </div>
</x-nav>


<style>
    body {
        margin-top: 5rem;
    }
</style>
