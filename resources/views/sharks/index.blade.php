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

    <h1>All the sharks</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>shark Level</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @forelse($sharks as $shark)
            <tr>
                <td>{{ $shark->id }}</td>
                <td>{{ $shark->name }}</td>
                <td>{{ $shark->email }}</td>
                <td>{{ $shark->shark_level }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    <form action="{{route('sharks.destroy', $shark->id)}}" method="POST" class=form-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-small btn-danger inline">Delete this shark</button>
                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                        <a class="btn btn-small btn-success" href="{{ route('sharks.show', $shark->id) }}">Show this shark</a>

                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ route('sharks.edit', $shark->id) }}">Edit this shark</a>
                    </form>

                </td>
            </tr>
        @empty

        @endforelse
        </tbody>
    </table>

</div>
</body>
</html>