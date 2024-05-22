@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />

@endsection

@section('content')
<div class="p-4">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>Full Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Action</th>
            {{-- <th>Actions</th> --}}
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user?->id }}</td>
                <td>{{ $user->first_name}} {{ $user->last_name }}</td>
                <td>{{$user->getRoleNames()[0]}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_code }} {{ $user->phone }}</td>
                {{-- <td>{{ $user->phone }}</td> --}}
                <td>{{ ucfirst($user->gender) }}</td>
                <td>{{ $user?->address?->country }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- <i class="fa-solid fa-angle-down" style="color: #ffffff;"> --}}
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('admin.show_user_profile', ['id' => $user->id]) }}" ><i class="fa-solid fa-eye" style="color: #008000;"></i> View</a></li>
                          <li><a class="dropdown-item btnUnblock" href="#" data-user-id="{{ $user->id }}"
                            data-url="{{ route('admin.unblock_user', ['id' => $user->id]) }}"><i class="fa-solid fa-lock-open"></i> Unblock</a></li>
                          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can" style="color: #f10101;"></i> Delete</a></li>

                          {{-- <li><a class="dropdown-item btnBlock" href="#" data-user-id="{{ $user->id }}"
                            data-url="{{ route('admin.block_user', ['id' => $user->id]) }}"><i
                                class="fa-solid fa-lock" style="color: #f10101;"></i> Block</a></li> --}}
                        </ul>
                      </div>
                </td>
                {{-- <td><a class="btn btn-danger" href="{{route('doctor.profile.delete_education')}}"></i></a></td> --}}
                {{-- <td><button class="btn btn-danger" name="edu_id" value="{{ $edu?->id }}"><i
                            class="fa-regular fa-trash-can"></button></td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection


@section('scripts')
<script>

    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
            // "searching": false, // Disable search bar
            "paging": false, // Disable pagination
            // "info": false
        });


        $('.btnUnblock').on('click', function(e) {
            e.preventDefault();

            var url = $(this).data('url'); // Get the URL from the data attribute
            console.log(url);

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to Unblock this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Unblock it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the controller
                    window.location.href = url;
                }
            })
        });

    });
</script>
@endsection
