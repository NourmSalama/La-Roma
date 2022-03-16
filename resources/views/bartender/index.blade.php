<x-nav>
    <h1>Bartender Incoming orders</h1>

    <table class="table">
        @if(session()->get('success'))
            <div id="showMe" class="alert alert-success" >
                {{ session()->get('success') }}
            </div>
        @endif
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Incoming Item</th>
            <th scope="col">Item type</th>
            <th scope="col">Order Status</th>
        </tr>
        </thead>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->reservation->customer->name }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->product->type }}</td>
                <td><a href="{{ route('bartender.edit', $order->id) }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to COMPLETE this order ?')">Complete Order</a></td>
            </tr>
        @endforeach
    </table>
</x-nav>


<style>
    body {
        margin-top: 5rem;
    }
</style>

<script>
    $("#showMe").delay(1500).fadeOut(600);
</script>
