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
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Acquent Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Company">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/employee">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/report">Report</a>
                    </li>

                </ul>
            </div>
            <div class="float-right">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5 mb-5">
            @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
           <div class="card">
               <div class="card-header">
             <div class="row bg-primary">

                <h4>Add Employee Details
                    <a href="/employee">
                        <button class="small float-end bg-primary btn-sm">Back</button>
                    </a>
                </h4>
             </div>
            </div>
           <div class="card-body">
            <form action="/store" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group pt-3">
                  <label for="exampleInputEmail1">Employee Name</label>
                  <input type="text" name="name" class="form-control" id="" placeholder="Enter Name">
                  <small id="emailHelp" class="form-text text-muted">Given Your full Name.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" name="phone_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Company</label>
                    <select name="company" class="form-control" id="exampleFormControlSelect1">
                      <option value="">-Select Compay-</option>
                      @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                      @endforeach
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Select your company name.</small>
                  </div>
                    <div class="form-group ">
                      <label for="inputCity">City</label>
                      <input  type="text" name="city" class="form-control" id="inputCity">
                      <small id="emailHelp" class="form-text text-muted">Given Your city Name.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Profile Image Drop Here!</label>
                      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">

                    </div>
                    <small id="emailHelp" class="form-text text-muted">Given Your Valid file.</small>
                    <div class="form-group">
                        <label for="">Joinning Date</label>
                        <input type="date" name="joining_date" class="form-control" id="" placeholder="Enter Name">
                        <small id="emailHelp" class="form-text text-muted">Given Your Joinning Date.</small>
                      </div>



                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
