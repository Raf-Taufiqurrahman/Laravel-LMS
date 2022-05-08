@extends('layouts.backend.master')

@section('title', 'Transactions')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card-action title="List Transactions" url="{{ route('member.transactions.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>Invoice</th>
                                <th>Email</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $i => $transaction)
                                <tr>
                                    <td class="text-muted">{{ $i + $transactions->firstItem() }}</td>
                                    <td class="text-muted">{{ $transaction->invoice }}</td>
                                    <td class="text-muted">{{ $transaction->user->email }}</td>
                                    <td class="text-muted">
                                        Rp. {{ number_format($transaction->details[0]->grand_total) }}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $transaction->status == 0 ? 'red' : 'success' }}">
                                            {{ $transaction->status == 0 ? 'Pending' : 'Success' }}
                                        </span>
                                    </td>
                                    <td class="text-muted">
                                        {{ Carbon\Carbon::parse($transaction->date_transfer)->format('d F Y') }}
                                    </td>
                                    <td>
                                        <x-button.button-link title="Details"
                                            url="{{ route('member.transactions.show', $transaction->invoice) }}"
                                            icon="file" class="btn btn-primary" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table.table-responsive>
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
