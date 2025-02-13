<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <p></p>
    <title>Simple TPN Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Simple TPN Database</h2>
                    <h7>Simple TPN Database is a simple project that functions to record the information of children in the world of The Promised Neverland. The system records the child's name, identity, gender, height, birthday, and blood type, similar to how children in orphanages (Grace Field House) are listed before they are sent to the 'outside world'.</h7>
                    <p></p>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('childs.create') }}"> Create Children</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Children Name</th>
                    <th>Children Identifier</th>
                    <th>Children Gender</th>
                    <th>Children Height</th>
                    <th>Children Birthday</th>
                    <th>Children Bloodtype</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childs as $child)
                <tr>
                    <td>{{ $child->id }}</td>
                    <td>{{ $child->name }}</td>
                    <td>{{ $child->identifier }}</td>
                    <td>{{ $child->gender }}</td>
                    <td>{{ $child->height }}</td>
                    <td>{{ $child->birthday }}</td>
                    <td>{{ $child->bloodtype }}</td>
                    <td>
                        <form action="{{ route('childs.destroy', $child->id) }}" method="POST">
                            @if ($child->id != 1)
                            <a class="btn btn-primary" href="{{ route('childs.edit', $child->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @else
                            <button type="button" class="btn btn-secondary" disabled>Cannot Edit</button>
                            <button type="button" class="btn btn-danger" disabled>Cannot Delete</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $childs->links() !!}
    </div>
</body>

</html>