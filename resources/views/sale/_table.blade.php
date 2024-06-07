<div class="card-body table-wrap p-0">
    <table class="table table-btransactioned table-hover table-bordered text-nowrap">
        <thead class="thead-dark text-uppercase">
            <tr>
                <th>No.</th>
                <th>Customer Name</th>
                <th>Table</th>
                <th>Total Paid</th>
                <th>Total Due</th>
                <th>Status</th>
                <th>Discount</th>
                <th>Subtotal</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ @$transaction->customer->first_name }} {{ @$transaction->customer->last_name }}</td>
                    <td>{{ @$transaction->table->table_name }}</td>
                    <td>{{ config('settings.currency_symbol') }} {{ $transaction->total_paid }}</td>
                    <td>{{ config('settings.currency_symbol') }} {{ $transaction->total_due }}</td>
                    <td>
                        @if ($transaction->status == 'due')
                            <span class=" btn btn-sm btn-warning">Due</span>
                        @elseif($transaction->status == 'partial')
                            <span class=" btn btn-sm btn-info text-white">Partial</span>
                        @else
                            <span class=" btn btn-sm btn-success">Paid</span>
                        @endif
                    </td>
                    <td>{{ config('settings.currency_symbol') }} {{ $transaction->discount ?? 0 }}</td>
                    <td>{{ config('settings.currency_symbol') }} {{ $transaction->subtotal }}</td>
                    <td>{{ config('settings.currency_symbol') }} {{ $transaction->total }}</td>
                    <td>
                        <div style="display:flex;">
                            <span>
                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#staticBackdrop"><i class="fas fa-edit"></i></a>
                            </span>
                            <span>
                                <a href="" class="btn btn-secondary btn-sm ml-2"><i
                                        class="fas fa-eye"></i></a>
                            </span>
                            <span>
                                <form id="deleteForm{{ $transaction->id }}"
                                    action="{{ route('transaction.destroy', ['transaction' => $transaction->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-md text-uppercase btn-sm ml-2 delete-button"
                                        type="button" data-transaction-id="{{ $transaction->id }}"> <i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Total Paid: {{ config('settings.currency_symbol') }} {{ $totalpaid, 2 }}</th>
                <th>Total Due: {{ config('settings.currency_symbol') }} {{ $total_due, 2 }}</th>
                <th></th>
                <th>Total Discount: {{ config('settings.currency_symbol') }} {{ $discount, 2 }}</th>
                <th>Subtotal: {{ config('settings.currency_symbol') }} {{ $subtotal, 2 }}</th>
                <th>Total Paid: {{ config('settings.currency_symbol') }} {{ $total_amount, 2 }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <div class="col-12 d-flex flex-row flex-wrap">
        <div class="col-12 col-sm-6 text-center text-sm-left" style="margin-block: 20px">
            {{ __('Showing') }} {{ $transactions->firstItem() }} {{ __('to') }}
            {{ $transactions->lastItem() }} {{ __('of') }} {{ $transactions->total() }}
            {{ __('entries') }}
        </div>
        <div class="col-12 col-sm-6 float-lg-right"> {{ $transactions->appends(request()->input())->links() }}
        </div>
    </div>
</div>
