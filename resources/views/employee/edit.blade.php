<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel Task</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5 mb-5">
            @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
           <div class="card justify-content-center" >
               <div class="card-header">
             <div class="row bg-primary">

                <h4 class="text-white">Edit Employee
                    <a href="/employee">
                        <button class="small float-end bg-warning mt-2">Back</button>
                    </a>
                </h4>
             </div>
            </div>
           <div class="card-body">
            <form action="/update/{{ $edit_employee->id }} " method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group pt-3">
                  <label for="">Employee Name</label>
                  <input type="text" name="name" value="{{ $edit_employee->name }}" class="form-control" id="" placeholder="Enter Name">
                  <small id="emailHelp" class="form-text text-muted">Update Your full Name.</small>
                </div>
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" name="email" value="{{ $edit_employee->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone_number" value="{{ $edit_employee->phone_number }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Company</label>
                    <select name="company" class="form-control" id="exampleFormControlSelect1">
                      <option value="">-Select Compay-</option>
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}" @if($edit_employee->company_id == $company->id) selected @endif>{{ $company->name }}</option>
                        @endforeach

                    </select>
                    <small id="emailHelp" class="form-text text-muted">Select your company name.</small>
                  </div>
                    <div class="form-group ">
                      <label for="inputCity">City</label>
                      <input  type="text" name="city" value="{{ $edit_employee->city }}" class="form-control" id="inputCity">
                      <small id="emailHelp" class="form-text text-muted">Update Your city Name.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Profile Image Drop Here!</label>
                      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"><br>
                      <img src="{{ asset('uploads/employees/'.$edit_employee->image) }}" width="100px" height="70px" alt="Employee Img"></td>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">Update Your Valid file.</small>
                    <div class="form-group">
                        <label for="">Joinning Date</label>
                        <input type="input" name="joining_date" value="{{ $edit_employee->joining_date }}" class="form-control" id="" placeholder="Enter Name">
                        <small id="emailHelp" class="form-text text-muted">Update Your Joinning Date.</small>
                      </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           </div>
           </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
