<div class="modal fade" id="edit-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-uppercase" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('user.update',['user'=>$user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter name" value="{{ $user->first_name }}">
                    </div>
                    <div class="col-sm-4">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter name" value="{{ $user->last_name }}">
                    </div>
                    <div class="col-sm-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $user->email }}" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="">Role</label>
                        <select class="form-control ambitious-form-loading select2" name="role" id="role" placeholder="Select role">
                            <option value="{{ old('role') }}" disabled selected>Select role</option>
                            @foreach ($roles as $role)
                            @if (old('role') == $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @elseif ($user->roles->contains($role->id))
                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm float-lg-right ml-1">Update</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm float-lg-right">Close</a>
            </form>
        </div>
      </div>
    </div>
