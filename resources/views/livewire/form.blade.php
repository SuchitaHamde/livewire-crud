<div>
    <div class="container">
    <form wire:submit.prevent="submit" class="form-control" ><br>
        @if(session()->has('success'))
        <div style="color: blue">
            {{ session('success') }}
        </div>
        @endif
        <input type="hidden" class="form-control;width:90%"  wire:model="hiddenId" value="{{ $hiddenId }}">
        First Name:<br><input type="text" class="form-control"  wire:model="fname">
        @error('fname')
        <span style="color:red">
            {{ $message }}
        </span>
            
        @enderror
        <br>
        Last Name:<br><input type="text" class="form-control" wire:model="lname">
        @error('lname')
        <span style="color:red">
            {{ $message }}
        </span>
            
        @enderror <br>
        Gender: <br>
        <select class="form-select" aria-label="Default select example" wire:model="gender">
            <option selected>Choose...</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
           
          </select>
          @error('gender')
        <span style="color:red">
            {{ $message }}
        </span>
            
        @enderror <br>
        Phone:<br><input type="text" class="form-control"  wire:model="phone">
        @error('phone')
        <span style="color:red">
            {{ $message }}
        </span>
            
        @enderror <br>
        Education:<br><input type="text" class="form-control"  wire:model="education">
        @error('education')
        <span style="color:red">
            {{ $message }}
        </span>
            
        @enderror
        <br><br>

        <button type="submit" class="btn btn-primary">Save</button>
        <br><br>
    </form><br>
    <h3 class="text text-center">Student list :</h3><a href="javascript:void(0)" class="btn btn-primary" wire:click="add">Add Student</a><br><br>
    </div>
    <div class="container">
    <table class="table table-striped">
        <tr>
            <th>Sr No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Education</th>
            <th>Action</th>
        </tr>
        
    @foreach ($data as $item )
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->fname }}</td>
        <td>{{ $item->lname }}</td>
        <td>{{ $item->gender }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->education }}</td>
        <td>
            <a href="javascript:void(0)" class="btn btn-success md-2" wire:click="edit({{ $item->id }})">Edit</a>
            <a href="javascript:void(0)" class="btn btn-danger" wire:click="delete({{ $item->id }})">Delete</a>
        </td>
    </tr>
        
        
    @endforeach
    </table>
    </div>
</div>