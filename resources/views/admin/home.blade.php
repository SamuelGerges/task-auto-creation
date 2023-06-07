@extends('layouts.site')
@section('content')
    <div>
        <h2>Users</h2>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Album</a>
                    </div>
                </div><!-- end of row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table datatable" id="admins-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                </tr>
                                </thead>
                                @isset($users)
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1  }}</td>
                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $user->user_email }}</td>
                                            <td>{{ $user->user_phone }}</td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->


@endsection



