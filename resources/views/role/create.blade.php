@extends('layouts.admin')
@section('title','Create Role')
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
        <form action="{{ route('store_role') }}" method="POST" class="">
            @csrf
            <div class="clearfix">
                <div class="">
                    <div class="form-group col-12">
                        <label for="">Role Name</label>
                        <input type="text" name="name" class="form-control" style="position: relative;left:-12px" placeholder="Enter name">
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
                    <input type="checkbox" name="permissions[]" value="checked.all" class="custom-control-input toggle-status" id="checked_all" data-id="">
                    <label class="custom-control-label" for="checked_all"></label>
                </div>
            </div>
            <hr>
            <div class="user mt-4">Dashboard</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.dash" class="custom-control-input toggle-status" id="dashboard" data-id="">
                    <label class="custom-control-label" for="dashboard"></label>
                </div>
            </div>
            <hr>
            <div class="user mt-4">User</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.user" class="custom-control-input toggle-status" id="customSwitches" data-id="">
                    <label class="custom-control-label" for="customSwitches"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.user" class="custom-control-input toggle-status" id="customSwitches1" data-id="">
                    <label class="custom-control-label" for="customSwitches1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.user" class="custom-control-input toggle-status" id="customSwitches2" data-id="">
                    <label class="custom-control-label" for="customSwitches2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.user" class="custom-control-input toggle-status" id="customSwitches3" data-id="">
                    <label class="custom-control-label" for="customSwitches3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Role</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.role" class="custom-control-input toggle-status" id="role" data-id="">
                    <label class="custom-control-label" for="role"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.role" class="custom-control-input toggle-status" id="role1" data-id="">
                    <label class="custom-control-label" for="role1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.role" class="custom-control-input toggle-status" id="role2" data-id="">
                    <label class="custom-control-label" for="role2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.role" class="custom-control-input toggle-status" id="role3" data-id="">
                    <label class="custom-control-label" for="role3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Customer</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.customer" class="custom-control-input toggle-status" id="customer" data-id="">
                    <label class="custom-control-label" for="customer"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.customer" class="custom-control-input toggle-status" id="customer1" data-id="">
                    <label class="custom-control-label" for="customer1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.customer" class="custom-control-input toggle-status" id="customer2" data-id="">
                    <label class="custom-control-label" for="customer2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.customer" class="custom-control-input toggle-status" id="customer3" data-id="">
                    <label class="custom-control-label" for="customer3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Product</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.product" class="custom-control-input toggle-status" id="product" data-id="">
                    <label class="custom-control-label" for="product"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.product" class="custom-control-input toggle-status" id="product1" data-id="">
                    <label class="custom-control-label" for="product1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.product" class="custom-control-input toggle-status" id="product2" data-id="">
                    <label class="custom-control-label" for="product2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.product" class="custom-control-input toggle-status" id="product3" data-id="">
                    <label class="custom-control-label" for="product3"></label>
                </div>
            </div>
            <hr>
            <div class="user">All Sale</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.all_sale" class="custom-control-input toggle-status" id="all_sale" data-id="">
                    <label class="custom-control-label" for="all_sale"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.all_sale" class="custom-control-input toggle-status" id="all_sale1" data-id="">
                    <label class="custom-control-label" for="all_sale1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.all_sale" class="custom-control-input toggle-status" id="all_sale2" data-id="">
                    <label class="custom-control-label" for="all_sale2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.all_sale" class="custom-control-input toggle-status" id="all_sale3" data-id="">
                    <label class="custom-control-label" for="all_sale3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Expenses</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.expenses" class="custom-control-input toggle-status" id="expenses" data-id="">
                    <label class="custom-control-label" for="expenses"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.expenses" class="custom-control-input toggle-status" id="expenses1" data-id="">
                    <label class="custom-control-label" for="expenses1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.expenses" class="custom-control-input toggle-status" id="expenses2" data-id="">
                    <label class="custom-control-label" for="expenses2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.expenses" class="custom-control-input toggle-status" id="expenses3" data-id="">
                    <label class="custom-control-label" for="expenses3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Table</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.table" class="custom-control-input toggle-status" id="table" data-id="">
                    <label class="custom-control-label" for="table"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Create</label>
                    <input type="checkbox" name="permissions[]" value="create.table" class="custom-control-input toggle-status" id="table1" data-id="">
                    <label class="custom-control-label" for="table1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Edit</label>
                    <input type="checkbox" name="permissions[]" value="edit.table" class="custom-control-input toggle-status" id="table2" data-id="">
                    <label class="custom-control-label" for="table2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">Delete</label>
                    <input type="checkbox" name="permissions[]" value="delete.table" class="custom-control-input toggle-status" id="table3" data-id="">
                    <label class="custom-control-label" for="table3"></label>
                </div>
            </div>
            <hr>
            <div class="user">Report</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View Report</label>
                    <input type="checkbox" name="permissions[]" value="view.report" class="custom-control-input toggle-status" id="report" data-id="">
                    <label class="custom-control-label" for="report"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">View Borrow Report</label>
                    <input type="checkbox" name="permissions[]" value="view.borrow_report" class="custom-control-input toggle-status" id="report1" data-id="">
                    <label class="custom-control-label" for="report1"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">View Book Report</label>
                    <input type="checkbox" name="permissions[]" value="view.book_report" class="custom-control-input toggle-status" id="report2" data-id="">
                    <label class="custom-control-label" for="report2"></label>
                </div>
                <div class="custom-control col-3 custom-switch">
                    <label for="" style="position: absolute">View Customer Report</label>
                    <input type="checkbox" name="permissions[]" value="view.customer_report" class="custom-control-input toggle-status" id="report3" data-id="">
                    <label class="custom-control-label" for="report3"></label>
                </div>
            </div>
            <hr>
            <div class="user mt-4">Setting</div>
            <div class="row">
                <div class="custom-control col-3 custom-switch">
                    <label style="position: absolute">View</label>
                    <input type="checkbox" name="permissions[]" value="view.setting" class="custom-control-input toggle-status" id="setting" data-id="">
                    <label class="custom-control-label" for="setting"></label>
                </div>
            </div>
            <hr>
            <button class="btn btn-success float-lg-right ml-2">Save</button>
            <a href="{{ route('role.index') }}" class="btn btn-secondary float-lg-right">Cancel</a>
        </form>
    </div>
</div>
<!-- switchery js -->
<script src="src/plugins/switchery/switchery.min.js"></script>
@endsection
