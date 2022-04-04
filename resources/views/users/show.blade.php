<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    h3 {
        text-align: center;
    }

    .alert {
        text-align: center;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

</style>

<body>
    <h3>LIST USERS</h3>
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <table>
        <a href="{{ route('logout') }}">logout</a>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('delete', ['id' => $user->id]) }} "
                            onclick="return confirm('Bạn chắc chắn muốn xoá')">Delete</a>
                        <a href="{{ route('update', ['id' => $user->id]) }}">Update</a>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
