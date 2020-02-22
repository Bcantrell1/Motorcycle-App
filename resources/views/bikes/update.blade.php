@extends('layout')

@section('content')
        <div class="container-fluid">     
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('bikes.update', $bike->id) }}" method="post">
                    @method('PATCH') 
                    @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Make: </label>
                                <input type="text" name="make" class="form-control" value={{ $bike->make }} />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Model: </label>
                                <input type="text" name="model" class="form-control" value={{ $bike->model }} />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Year: </label>
                                <input type="date" name="year" class="form-control" value={{ $bike->year }} />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-50 float-right" >Update</button>
                    </form>
            </div>

        </div>
@endsection