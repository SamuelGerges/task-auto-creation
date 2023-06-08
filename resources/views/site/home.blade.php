@extends('layouts.site')
@section('content')
    <div>
        <h2>Users</h2>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">
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
                                    <th>Block</th>
                                </tr>
                                </thead>
                                @isset($users['success']['users'])
                                    @foreach($users['success']['users'] as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1  }}</td>
                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $user->user_email }}</td>
                                            <td>{{ $user->user_phone }}</td>
                                            <td>
                                                <a href="{{route('site.change.block',$user->id)}}"
                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                    @if($user -> is_blocked == 1)
                                                        Active
                                                    @else
                                                        Block
                                                    @endif
                                                </a>
                                            </td>
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



