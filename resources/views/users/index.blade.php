<?php $breadcrumb = '
<li class="breadcrumb-item active"><span>Users</span></li>'; ?>
@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Users') }}
            <a class="btn btn-success float-end" href="{{ route('users.create') }}"> Tambah User</a>
        </div>

        <div class="card-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            {{-- <form method="GET" action="{{ route('users.index') }}" class="mb-3 row"> --}}
            <form id="search-form" class="mb-3 row">
                {{-- <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="form-control form-control-sm" placeholder="Cari nama atau email...">
                </div> --}}

                <div class="col-md-4">
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        class="form-control form-control-sm" placeholder="Cari nama atau email...">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-secondary btn-sm">Cari</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light btn-sm">Reset</a>
                </div>
            </form>

            
            <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle text-center">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>

                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $role)
                                        <span class="badge bg-success">{{ $role }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>

            {!! $data->render() !!}
        </div>

        {{--        <div class="card-footer"> --}}
        {{--            {{ $users->links() }} --}}
        {{--        </div> --}}
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('users.index') }}",
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#user-table').html($(data).find('#user-table').html());
                    }
                });
            });
        </script>
    @endpush
@endsection
