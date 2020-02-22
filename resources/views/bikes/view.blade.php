@extends('layout')

@section('content')
        <div class="container-fluid">  
        <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div>
        @endif
        </div>   
            <div class="row">
                        <table class="table table-striped table-hover">
                            <tr>
                                <strong><th>Bike Id</th></strong>
                                <strong><th>Make</th></strong>
                                <strong><th>Model</th></strong>
                                <strong><th>Year</th></strong>
                                <th></th>
                                <th></th>
                            </tr>
                            </tr>
                            @foreach($bikes as $bike)
                            <tr>
                                <td>{{$bike->id}}</td>
                                <td>{{$bike->make}}</td>
                                <td>{{$bike->model}}</td>
                                <td>{{$bike->year}}</td>
                                <td><a href="{{ route('bikes.edit', $bike->id)}}" class="btn btn-primary">Edit</a></td>   
                                <td>
                                <form action='{{ route('bikes.destroy', $bike->id)}}'  method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                </td> 
                            </tr>
                            @endforeach
                    </table>
            </div>

        </div>
@endsection