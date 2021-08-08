@extends('_layout')

@section('main')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Total</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr class="text-center align-middle text-nowrap">
                    <td>
                        {{ $contact->name }}
                        <span class="text-muted small">#{{ $contact->id }}</span>
                    </td>
                    <td>
                        <span class="badge bg-{{ color($contact->total) }}">{{ fmt($contact->total) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('contacts.transactions.index', $contact) }}"
                           class="badge bg-dark btn-sm text-decoration-none">
                            Transactions
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <form class="d-flex flex-row gap-2" action="{{ route('contacts.store') }}" method="post">
        <input type="text" name="name" class="form-control" placeholder="Name" title="Name"
               value="{{ old('name') }}" required>
        <input type="submit" class="btn btn-dark" value="+">
        @csrf
    </form>
@endsection
