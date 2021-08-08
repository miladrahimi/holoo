@extends('_layout')

@section('main')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr class="text-center align-middle text-nowrap">
                    <td>
                        <span class="text-muted">#{{ $transaction->id }}</span>
                    </td>
                    <td>{{ $transaction->title }}</td>
                    <td>
                        <span class="badge bg-{{ color($transaction->amount) }}">{{ fmt($transaction->amount) }}</span>
                    </td>
                    <td>
                        <span class="badge bg-{{ color($transaction->total) }}">{{ fmt($transaction->total) }}</span>
                    </td>
                    <td class="small">{{ pdt($transaction->created_at, 'yyyy-MM-dd') }}</td>
                    <td class="small">{{ pdt($transaction->created_at, 'hh:mm:ss') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">{!! $transactions->links() !!}</div>
    <form class="d-flex flex-column gap-2" action="{{ route('contacts.transactions.store', $contact) }}" method="post">
        <input type="text" name="title" class="form-control" placeholder="Title" title="Title"
               value="{{ old('title') }}" required>
        <div class="d-flex flex-row gap-2">
            <input type="number" name="amount" class="form-control" placeholder="Amount (TOMAN)" title="Amount"
                   value="{{ old('amount') }}" required>
            <input type="submit" class="btn btn-dark" value="+">
        </div>
        @csrf
    </form>
@endsection
