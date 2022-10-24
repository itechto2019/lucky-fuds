@extends('index')
@section('inventory_return')
<div class="for-inventory-return">
    <div class="for-page-title">
        <h1>Returned</h1>
    </div>
    <div class="table-reservation">
        <div style="padding: 10px">
            <h3>Items</h3>
        </div>
        <div class="table-form">
            @if (!$rents->isEmpty())
            <table>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date for use</th>
                    <th>Date for return</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                @foreach ($rents as $rent)
                <tr>
                    <td>{{ $rent->id }}</td>
                    <td>{{ $rent->client }}</td>
                    <td>{{ $rent->returns ? $rent->returns->item : '' }}</td>
                    <td>{{ $rent->returns ? $rent->returns->quantity : '' }}</td>
                    <td>₱{{ $rent->amount }}</td>
                    <td>{{ $rent->date }}</td>
                    <td>{{ $rent->return }}</td>
                    <td>{{ $rent->status === "extended" ? "returned" : $rent->status}}</td>
                    <td>
                        @if (!$rent->is_returned)
                        <div class="action-form">
                            <div class="action-button">
                                <form action="{{ route('add_to_items', $rent->id) }}" method="POST">
                                    @csrf
                                    <button class="action-print">
                                        Add to Items
                                    </button>
                                </form>
                            </div>
                            <div class="action-button">
                                <form action="{{ route('add_to_rents', $rent->id) }}" method="POST">
                                    @csrf
                                    <button class="action-print">
                                        To Rent
                                    </button>
                                </form>
                            </div>
                        </div>
                        @else
                        Item is returned
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            @else
                <div style="padding: 10px">
                    <h3>No items returned</h3>
                </div>
                <a href="{{ route('inventory_approves') }}" style="text-decoration: none; color:#06283D">
                    <- Check approves</a>
            @endif
        </div>
    </div>
</div>
@endsection