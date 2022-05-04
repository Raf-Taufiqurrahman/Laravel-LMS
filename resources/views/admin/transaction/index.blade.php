@extends('layouts.backend.master')

@section('title', 'Transactions')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card-action title="List Transactions" url="{{ route('admin.transactions.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>Invoice</th>
                                <th>Username Bank</th>
                                <th>Bank Transafer</th>
                                <th>Paymet Method</th>
                                <th>Date Transfer</th>
                                <th>Status</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $i => $transaction)
                                <tr>
                                    <td class="text-muted">{{ $i + $transactions->firstItem() }}</td>
                                    <td class="text-primary">{{ $transaction->invoice }}</td>
                                    <td class="text-muted">{{ $transaction->name_of_bank }}</td>
                                    <td class="text-muted">{{ $transaction->bank_transfer }}</td>
                                    <td class="text-muted">{{ $transaction->method_of_payment }}</td>
                                    <td class="text-muted">
                                        {{ Carbon\Carbon::parse($transaction->date_transfer)->format('d F Y') }}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $transaction->status == 0 ? 'red' : 'success' }}">
                                            {{ $transaction->status == 0 ? 'Pending' : 'Success' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($transaction->status == 0)
                                            <form action="{{ route('admin.transactions.update', $transaction->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-button.button-save icon="check" title="Verfied"
                                                    class="btn-primary rounded-pill" />
                                            </form>
                                        @endif
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
