@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Report Dashboard') }}
                        <div class="card-title float-right">
                            <form action="/range" method="get">
                                <div class="row">
                                    <div class="col4">
                                        <div class="form-group">
                                            <input type="date" name="from" class="form-control-sm" >&nbsp;
                                        </div>
                                    </div>
                                    <div class="col4">
                                        <div class="form-group">
                                            <input type="date" name="to" class="form-control-sm">&nbsp;

                                        </div>
                                    </div>
                                    <div class="col2">
                                        <button class="btn btn-outline-secondary btn-sm">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Company</td>
                                <td>City</td>
                                <td>Joining Date</td>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // $(".table").DataTable()
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }
        });
        $(".table").DataTable({
            processing: true,
            serverSide: true,
            @if(request()->has('from') && request()->has('to'))
              ajax: "{{ URL::to('/report') }}?from={{request()->from}}&to={{request()->to}}",
              @else
              ajax: "{{ URL::to('/report') }}",

              @endif

            columns: [{
                    data: "id",
                    name: "id",
                    // oderable: false,
                    // searchable: false,
                },
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "company.name",
                    name: "company.name",
                },
                {
                    data: "city",
                    name: "city",
                },
                {
                    data: "joining_date",
                    name: "joining_date",
                },

            ]
        })
    </script>
@endsection
