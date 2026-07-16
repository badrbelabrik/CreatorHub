<!DOCTYPE html>
<html>
<head>
    <title>Create Workspace</title>
</head>
<body>

<h1>Create Workspace</h1>

<form action="{{ route('workspaces.store') }}" method="POST">
    @csrf

    <label>Title</label><br>
    <input type="text" name="title"><br><br>

    <label>Description</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Create Workspace</button>
</form>

</body>
</html>