<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('sharks.index') }}">shark Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('sharks.index') }}">View All sharks</a></li>
            <li><a href="{{ route('sharks.create') }}">Create a shark</a>
        </ul>
    </nav>

    <h1>Create a shark</h1>

    <form action="{{ route('sharks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}">
            @error('email')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="shark_level">Shark Level</label>
            <select name="shark_level" id="shark_level" class="form-control">
                <option @selected(old('shark_level') == 0) value="0" disabled>Select a Level</option>
                <option @selected(old('shark_level') == 1) value="1">Sees Sunlight</option>
                <option @selected(old('shark_level') == 2) value="2">Foosball Fanatic</option>
                <option @selected(old('shark_level') == 3) value="3">Basement Dweller</option>
            </select>
            @error('shark_level')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="Submit" class="btn btn-primary">Create the shark!</button>
    </form>



</div>
</body>
</html>