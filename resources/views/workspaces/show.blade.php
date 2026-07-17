<!DOCTYPE html>
<html>
<head>
    <title>{{ $workspace->title }}</title>
</head>
<body>

<h1>{{ $workspace->title }}</h1>

<p>{{ $workspace->description }}</p>

<hr>

<h2>Kanban Board</h2>

<table border="1" width="100%">
    <tr>
        <th>À faire</th>
        <th>En cours</th>
        <th>En révision</th>
        <th>Validé</th>
    </tr>

    <tr style="height:300px;">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

</body>
</html>