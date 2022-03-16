<x-nav>
    <div class="row">
        <div class="col-sm-8 offset-sm-2 mt-5">
            <h1 class="display-3">New Menu-Item</h1>

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

                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Item name:</label>
                        <input type="text" class="form-control" name="name"  required/>
                    </div>

                    <div class="form-group">
                        <label for="type">Item type:</label>
                        <div><label>Appetizers<input type="checkbox" name="type" value="appetizers" class="ml-2"></label></div>
                        <div><label>Main Dish<input type="checkbox" name="type" value="main-dish" class="ml-2"></label></div>
                        <div><label>Desserts<input type="checkbox" name="type" value="dessert" class="ml-2"></label></div>
                        <div><label>Warm drinks<input type="checkbox" name="type" value="warm-drink" class="ml-2"></label></div>
                        <div><label>Alcoholic drinks<input type="checkbox" name="type" value="alc-drink" class="ml-2"></label></div>
                        <div><label>Cold drinks<input type="checkbox" name="type" value="cold-drink" class="ml-2"></label></div>
                    </div>

                    <div class="form-group">
                        <label for="price">Item price:</label>
                        <input type="number" step="1"   min="1" max="100" class="form-control" name="price"  placeholder="$" required/>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Item quantity:</label>
                        <input type="number" step="1"   min="1" max="100" class="form-control" name="quantity" placeholder="1-100" required/>
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" required>
                    </div>



                    <button type="submit" class="btn btn-primary mt-3">Confirm product</button>
                </form>
            </div>
        </div>
    </div>
</x-nav>
