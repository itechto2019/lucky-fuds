@extends('index')
@section('inventory_reports')
<div class="for-inventory-reports">
    <div class="for-page-title">
        <h1>Reports</h1>
    </div>
    <div class="table-reservation">
        <div style="padding: 10px">
            <h3>Items</h3>
        </div>
        <div class="table-form">
            @if (!$reports->isEmpty())
                <div class="input-group" style="width:fit-content">
                    <form action="{{ route('export_inventory') }}" method="GET">
                        <button type="submit" class="btn-print">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>                     
                            Print     
                        </button>
                    </form>
                </div>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Client</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Return</th>
                    </tr>
                    @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td><img src="{{ asset("stocks") }}/{{ $report->image }}" width="50" alt=""></td>
                        <td>{{ $report->item }}</td>
                        <td>{{ $report->client }}</td>
                        <td>{{ $report->quantity }}</td>
                        <td>₱{{ $report->amount }}</td>
                        <td><small>{{ $report->date }}</small></td>
                        <td><small>{{ $report->return }}</small></td>
                    </tr>
                    @endforeach
                </table>
            @else
                <div style="padding: 10px">
                    <h3>No reports found!</h3>
                </div>
                <a href="{{ route('inventory_stocks') }}" style="text-decoration: none; color:#06283D"> <- Check status</a>
            @endif
        </div>
    </div>
</div>
@endsection