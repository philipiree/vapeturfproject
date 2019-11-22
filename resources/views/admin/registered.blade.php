@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Registered Users | Role Assignment</h4>
                    <div class="text-center col-md-6 mx-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif
                    </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-borderless">
                    <thead class="text-primary text-center">
                        <tr class="d-flex">
                            <th class="col-2">ID</th>
                            <th class="col-2">Name</th>
                            <th class="col-2">Email</th>
                            <th class="col-2">Role</th>
                            <th class="col-1"></th>
                            <th class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($users as $user)
                      <tr class="d-flex">
                       <td class="col-2">{{ $user->id }}</td>
                       <td class="col-2">{{ $user->name }}</td>
                       <td class="col-2" >{{ $user->email }}</td>
                       <td class="col-2">-{{ $user->usertype }}</td>
                       <td class="col-1"><a href="/role-edit/{{ $user->id }}" class="btn btn-success">EDIT</a></td>
                       <td class="col-1">
                           <form action="/role-delete/{{ $user->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE</button>
                           </form>
                       </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('script')

@endsection
