@extends('layouts.app')

@section('content')
@include('admin.users.sidebar')
<div class="my-content1">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @error('error')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror



    <div class="">
        {{-- <button type="button" class="btn btn-primary ml-4 mb-3" data-toggle="modal" data-target="#addContact">
            Add Staff
        </button> --}}

        <!-- Modal -->
        <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="#" method="POST"> @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="number" name="phone" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="">
            <div class="card">


                <div class="card-header">Sms OutBox</div>

                <div class="card-body">

                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">To</th>
                                <th scope="col">From</th>
                                <th scope="col">Body</th>
                                <th scope="col">Time</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($sms as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->to}}</td>
                                <td>{{$item->from}}</td>
                                <td>{{$item->body}}</td>
                                <td>{{$item->created_at}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                        {{-- {{ $users->links() }} --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
