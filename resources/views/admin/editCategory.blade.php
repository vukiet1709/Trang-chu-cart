<form role ="form" action="" method="post">

    @csrf
    
    {{-- @extends('admin.layout.index') --}}


    <label>Name</label>
    
    <input class="form-control" name="category_name" value ="{{$cate->category_name}}">
    
    <label>Description</label>
    
    <input class="form-control" name="description" value ="{{$cate->description}}">
    
    <button type="submit" class="btn btn-success">Submit Button</button>
    
    <button type="reset" class="btn btn-primary">Reset Button</button>
    
    </form>

