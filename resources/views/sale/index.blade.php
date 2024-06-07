@extends('layouts.admin')

@section('title', 'All Sale')
@section('content')
    <style>
        .form-control {
            btransaction-radius: 0;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a p {
            color: #333;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ccc;
            margin-right: 5px;
        }

        .pagination a:hover {
            background-color: #f5f5f5;
        }

        .pagination .disabled {
            color: #999;
            pointer-events: none;
        }

        #pagination-select {
            width: 65px;
        }
    </style>
    <div class="card">
        <h6 class="card-header">
            <a data-toggle="collapse" href="#collapse-example" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class="d-block">
                <i class="fa fa-filter"></i>
                Filter
            </a>
        </h6>
        <div id="collapse-example" class="collapse show" aria-labelledby="heading-example">
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-3"></div> -->
                    <div class="col-md-12">
                        <form action="{{ route('transaction.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="start-date">Start Date</label>
                                    <input type="date" name="start_date" class="form-control"
                                        value="{{ request('start_date') }}" />
                                </div>
                                <div class="col-md-5">
                                    <label for="end-date">End Date</label>
                                    <input type="date" name="end_date" class="form-control"
                                        value="{{ request('end_date') }}" />
                                </div>
                                <div class="col-md-2" style="margin-top: 30px">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-filter"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">Status</label>
                                <select id="status" name="status" class="form-control select2">
                                    <option value="" {{ request('status') == '' ? 'selected' : '' }}>All</option>
                                    <option value="due" {{ request('status') == 'due' ? 'selected' : '' }}>Due</option>
                                    <option value="partial" {{ request('status') == 'partial' ? 'selected' : '' }}>Partial</option>
                                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control select2">
                                    <option value="">{{ __('All') }}</option>
                                    @foreach ($customers as $row)
                                    <option value="{{ $row->id }}" {{ $row->id == request('customer_id') ? 'selected' : '' }}>
                                        {{ $row->first_name }}  {{ $row->last_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        @include('sale._table')
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.delete-button').on('click', function(e) {
            var transactionId = $(this).data('transaction-id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteForm' + transactionId).submit();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('change', '#customer_id, #status', function(e) {
            e.preventDefault();
            var customer_id = $('#customer_id').val();
            var status = $('#status').val();
            $.ajax({
                type: "GET"
                , url: '{{ route('transaction.index') }}'
                , data: {
                    'customer_id': customer_id
                    , 'status': status
                }
                , dataType: "json"
                , success: function(response) {
                    console.log(response);
                    if (response.view) {
                        $('.table-wrap').replaceWith(response.view);
                    }
                }
                , error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        $('#customer_id').select2();
        $('#status').select2();
    });
</script>
