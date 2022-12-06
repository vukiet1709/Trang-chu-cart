
<form role ="form" action="" method="post">

    @csrf
    
    {{-- @extends('admin.layout.index') --}}


    <label>Name</label>
    <input class="form-control" name="username" value ="{{$cate->username}}">
    
    <label>Email</label>
    <input class="form-control" name="email" value ="{{$cate->email}}">
    
    <label>Password</label>
    <input class="form-control" name="password" value="{{$cate->password}}">
    
    <label>Role</label>
    <input class="form-control" name="role" value="{{$cate->role}}">

    <button type="submit" class="btn btn-success">Submit Button</button>
    
    <button type="reset" class="btn btn-primary">Reset Button</button>
    
    </form>

