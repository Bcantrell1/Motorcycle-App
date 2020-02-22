@extends('layout')

@section('content')
        <div class="container-fluid">     
            <div class="row">
                <div class="col-md-6">
                    <form action="/create" method="post">
                    @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Make: </label>
                                <input type="text" name="make" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Model: </label>
                                <input type="text" name="model" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Year: </label>
                                <input type="date" name="year" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-50 float-right" >Create</button>
                    </form>
            </div>

        </div>
@endsection