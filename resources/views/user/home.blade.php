@extends('template_dashboard.template')

@section('title', 'Home')

@section('breadcrumb')
    <span> > Home</span>
    <span> > Test</span>
@endsection

<style>
    div.user {
        background: lightcyan;
        margin-bottom: 10px;
        box-shadow: 3px 3px 3px lightgray;
        border: 1px solid turquoise;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


@section('page-content')
    <section class="section card">
        <div class="card-body">
            first section
        </div>
    </section>
    <section style="height: 50vh;" class="section card">
        <div class="card-body">
            {{-- @foreach($users as $key => $user)
                <div class="user">
                    <div><strong>{{$user->name}}</strong></div>
                    <div>{{$user->email}}</div>
                    <div>{{$user->id}}</div>
                </div>
            @endforeach --}}

            <table class="table table-hover table-striped table-info" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready( function () {
            $('#myTable').DataTable({
                ajax: {
                    url: 'http://localhost:8000/api/users',
                    type: 'get',
                    datatype: 'json',

                },
                columns: [
                    {'data': 'id'},
                    {'data': 'name'},
                    {'data': 'email'},
                    {'data': 'options'},
                ]
            });
        } );
    </script>
@endsection