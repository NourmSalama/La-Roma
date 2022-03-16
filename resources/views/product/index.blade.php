<x-nav>
    <table class="table">
        @if(session()->get('success'))
            <div id="showMe" class="alert alert-success" >
                {{ session()->get('success') }}
            </div>
        @endif
        <h1 class="d-flex justify-content-center">Menu Items</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-4 mt-2">
                    <form action="{{ route('product.destroy', $product->id) }}" method="post"  onsubmit="return confirm('Are you sure you want to DELETE this menu item ? (This is not revertable)!')">
                        @csrf
                        @method('DELETE')
                        <div class="card ml-5 mr-5" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('/images/' . $product->image_path) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->type }}</p>
                                <p class="card-text">${{ $product->price }}</p>
                                <button class="btn btn-danger" type="submit" >Delete</button>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </form>
                </div>
              @endforeach
        </div>
    </table>
    <script>
        $("#showMe").delay(1500).fadeOut(600);
    </script>
</x-nav>
