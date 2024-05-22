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
            <th>First name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Message</th>
            {{-- <th>Actions</th> --}}
        </tr>
    </thead>

    <tbody>
        @foreach ($contact_us as $info)
            <tr>
                <td>{{ $info?->id }}</td>
                <td>{{ $info->first_name}}</td>
                <td>{{ $info->last_name }}</td>
                <td>{{ $info->email }}</td>
                <td>{{ $info->message }}</td>
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

    });
</script>
@endsection
