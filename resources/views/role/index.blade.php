@extends('layouts.admin')
@section('title', 'Role')
@section('content-header', 'ALL Role')
@section('content')
    <div class="card">
        <div class="card-header text-uppercase">
            List Role
            {{-- @if (auth()->user()->can('create.role')) --}}
            <a href="{{ route('add_role') }}" class="btn btn-primary btn-sm float-lg-right">+ Add New</a>
            {{-- @endif --}}
        </div>
        <div class="card-body">
            <table class="table datatable nowrap table-bordered table-hover">
                <thead class="bg-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="table-plus">{{ $role->name }}</td>
                            <td>
                                @if ($role->name != 'Admin')
                                    {{-- @if (auth()->user()->can('edit.role')) --}}
                                    <a href="{{ route('edit_role', ['id' => $role->id]) }}"
                                        class="btn btn-outline-success btn-sm text-uppercase"><i class="fas fa-edit">
                                            Edit</i></a>
                                    {{-- @endif
                                    @if (auth()->user()->can('delete.role')) --}}
                                    <form id="deleteForm" action="{{ route('destroy_role', ['id' => $role->id]) }}"
                                        method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn btn-outline-danger btn-sm btn-md delete-btn text-uppercase"
                                            title="@lang('Delete')">
                                            <i class="fa fa-trash ambitious-padding-btn"> Delete</i>
                                        </button>
                                    </form>
                                    {{-- @endif --}}
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <h4>No data</h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="col-12 d-flex flex-row flex-wrap">
                <div class="col-12 col-sm-6 text-center text-sm-left" style="margin-block: 20px">
                    {{ __('Showing') }} {{ $roles->firstItem() }} {{ __('to') }}
                    {{ $roles->lastItem() }} {{ __('of') }} {{ $roles->total() }}
                    {{ __('entries') }}
                </div>
                <div class="col-12 col-sm-6 float-lg-right"> {{ $roles->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
