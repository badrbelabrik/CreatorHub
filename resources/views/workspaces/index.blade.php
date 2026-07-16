<!DOCTYPE html>
<html>
<head>
    <title>My Workspaces</title>
</head>
<body>

<h1>My Workspaces</h1>

<a href="{{ route('workspaces.create') }}">
    Create Workspace
</a>

<hr>

@foreach($workspaces as $workspace)

    <h3>{{ $workspace->title }}</h3>

    <p>{{ $workspace->description }}</p>

    <hr>

@endforeach

</body>
</html>