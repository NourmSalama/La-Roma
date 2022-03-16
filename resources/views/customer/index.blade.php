<x-nav>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Customer Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
            </tr>
    @endforeach
</x-nav>
