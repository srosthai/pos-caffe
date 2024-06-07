@extends('layouts.admin')
@section('title','Edit Role')
@section('content')
<style>
    .row {
        position: relative;
        left: 25px;
    }

    .product,
    .user {
        position: relative;
        left: 10px;
    }

</style>
<div class="back-btn">
    <a href="{{ route('role.index') }}" class="float-left" data-value="veiw">
        <i class="fa-solid fa-angles-left"></i>&nbsp;&nbsp;
        Back to all Role
    </a><br>
</div><br>
<div class="card">
    <div class="card-body">
        <form action="{{ route('update_role',['id'=>$role->id]) }}" method="POST" class="">
            @csrf
            @method('PUT')
            <div class="clearfix">
                <div class="">
                    <div class="form-group col-6">
                        <label for="">Role Name</label>
                        <input type="text" name="name" class="form-control" style="position: relative;left:-12px" value="{{ $role->name }}">
                    </div>
                </div>
            </div>
            <div>
                <span>Select Role</span>
            </div>
            <hr>
            <div class="user mt-4"><h5>Check All Role</h5></div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">Checked</label>
                    <input type="checkbox" name="permissions[]" value="checked.all" @if (in_array('checked.all', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="checked_all" data-id="">
                    <label class="custom-control-label" for="checked_all"></label>
                </div>
            </div>
            <hr>
            <div class="user mt-4">Dashboard</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.dash" @if (in_array('view.dash', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="dashboard" data-id="">
                    <label class="custom-control-label" for="dashboard"></label>
                </div>
            </div>
            <hr>
            <div class="user mt-4">User</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.user" @if (in_array('view.user', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customSwitches" data-id="">
                    <label class="custom-control-label" for="customSwitches"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.user" c @if (in_array('create.user', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customSwitches1" data-id="">
                    <label class="custom-control-label" for="customSwitches1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.user" @if (in_array('edit.user', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customSwitches2" data-id="">
                    <label class="custom-control-label" for="customSwitches2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.user" @if (in_array('delete.user', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customSwitches3" data-id="">
                    <label class="custom-control-label" for="customSwitches3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Role</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.role" @if (in_array('view.role', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="role" data-id="">
                    <label class="custom-control-label" for="role"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.role" @if (in_array('create.role', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="role1" data-id="">
                    <label class="custom-control-label" for="role1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.role" @if (in_array('edit.role', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="role2" data-id="">
                    <label class="custom-control-label" for="role2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.role" @if (in_array('delete.role', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="role3" data-id="">
                    <label class="custom-control-label" for="role3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Customer</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.customer" @if (in_array('view.customer', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customer" data-id="">
                    <label class="custom-control-label" for="customer"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.customer" @if (in_array('create.customer', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customer1" data-id="">
                    <label class="custom-control-label" for="customer1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.customer" @if (in_array('edit.customer', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customer2" data-id="">
                    <label class="custom-control-label" for="customer2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.customer" @if (in_array('delete.customer', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="customer3" data-id="">
                    <label class="custom-control-label" for="customer3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Product</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.product" @if (in_array('view.product', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="product" data-id="">
                    <label class="custom-control-label" for="product"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.product" @if (in_array('create.product', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="product1" data-id="">
                    <label class="custom-control-label" for="product1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.product" @if (in_array('edit.product', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="product2" data-id="">
                    <label class="custom-control-label" for="product2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.product" @if (in_array('delete.product', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="product3" data-id="">
                    <label class="custom-control-label" for="product3"></label>
                </div>
            </div>
            <hr>
            <div class="user">All Sale</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.all_sale" @if (in_array('view.all_sale', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="all_sale" data-id="">
                    <label class="custom-control-label" for="all_sale"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.all_sale" @if (in_array('create.all_sale', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="all_sale1" data-id="">
                    <label class="custom-control-label" for="all_sale1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.all_sale" @if (in_array('edit.all_sale', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="all_sale2" data-id="">
                    <label class="custom-control-label" for="all_sale2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.all_sale" @if (in_array('delete.all_sale', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="all_sale3" data-id="">
                    <label class="custom-control-label" for="all_sale3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Expenses</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.expenses" @if (in_array('view.expenses', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="expenses" data-id="">
                    <label class="custom-control-label" for="expenses"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.expenses" @if (in_array('create.expenses', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="expenses1" data-id="">
                    <label class="custom-control-label" for="expenses1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.expenses" @if (in_array('edit.expenses', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="expenses2" data-id="">
                    <label class="custom-control-label" for="expenses2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.expenses" @if (in_array('delete.expenses', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="expenses3" data-id="">
                    <label class="custom-control-label" for="expenses3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Table</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.table" @if (in_array('view.table', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="table" data-id="">
                    <label class="custom-control-label" for="table"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.table" @if (in_array('create.table', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="table1" data-id="">
                    <label class="custom-control-label" for="table1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.table" @if (in_array('edit.table', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="table2" data-id="">
                    <label class="custom-control-label" for="table2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.table" @if (in_array('delete.table', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="table3" data-id="">
                    <label class="custom-control-label" for="table3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Report</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View Report</label>
                    <input type="checkbox" name="permissions[]" value="view.report" @if (in_array('view.report', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="report" data-id="">
                    <label class="custom-control-label" for="report"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">View Borrow Report</label>
                    <input type="checkbox" name="permissions[]" value="view.borrow_report" @if (in_array('view.borrow_report', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="report1" data-id="">
                    <label class="custom-control-label" for="report1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">View Book Report</label>
                    <input type="checkbox" name="permissions[]" value="view.book_report" @if (in_array('view.book_report', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="report2" data-id="">
                    <label class="custom-control-label" for="report2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">View Customer Report</label>
                    <input type="checkbox" name="permissions[]" value="view.customer_report" @if (in_array('view.customer_report', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="report3" data-id="">
                    <label class="custom-control-label" for="report3"></label>
                </div>
            </div>
            <hr>
            <div class="user mt-4">Setting</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.setting" @if (in_array('view.setting', $role_permissions)) checked @endif class="custom-control-input toggle-status" id="setting" data-id="">
                    <label class="custom-control-label" for="setting"></label>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success float-lg-right ml-1">Update</button>
            <a href="{{ route('role.index') }}" class="btn btn-secondary float-lg-right">Close</a>
        </form>
    </div>
</div>
</div>
<!-- switchery js -->
<script src="src/plugins/switchery/switchery.min.js"></script>
@endsection
