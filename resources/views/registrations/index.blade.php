@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <h2>{{ __('Registrants') }}</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td scope="row">{{ $row->user_id }}</td>
                        <td>{{ $row->first_name }}</td>
                        <td>{{ $row->last_name }}</td>
                        <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
                        <td>{{ $row->contact_number }}</td>
                        <td>{{ $row->user_type }}</td>
                        <td>{{ $row->status }}</td>
                        <td><a href="{{ route('registrations.edit', ['user_id' => $row->user_id]) }}">[Edit]</a><a href="{{ route('registrations.delete', ['user_id' => $row->user_id]) }}">[Delete]</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>      
        </div>  
    </div>
  </div>

    
</div>
@endsection
