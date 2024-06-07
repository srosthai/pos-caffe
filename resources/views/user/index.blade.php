@extends('layouts.admin')
@section('title','User')
@section('content')
    <div class="card">
        <div class="card-header text-uppercase">User List
            <a href="" class="btn btn-primary btn-sm float-lg-right text-uppercase" data-toggle="modal" data-target="#create">+ Add new</a>
            @include('user.create')
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ @$user->roles->first()->name }}</td>
                        <td>
                            <a href="" class="btn btn-outline-primary btn-sm text-uppercase" data-toggle="modal" data-target="#edit-{{ $user->id }}"><i class="fas fa-edit">
                                Edit</i></a>
                            <form id="deleteForm" action="{{ route('user.destroy',['user'=>$user->id]) }}"method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-outline-danger btn-sm delete-btn text-uppercase" title="@lang('Delete')"><i class="fa fa-trash ambitious-padding-btn"> Delete</i></button>
                                </form>
                                </td>
                            @include('user.edit')
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
