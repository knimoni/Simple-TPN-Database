<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Children Form </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Children</h2>
                </div>
                <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('childs.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ isset($child) ? route('childs.update', $child->id) : '#' }}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Children Name:</strong>
                        <input type="text" name="name" value="{{ $child->name }}" class="form-control"
                            placeholder="Children name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Children Identifier:</strong>
                        <input type="text" name="identifier" class="form-control" value="{{ old('identifier', $child->identifier) }}" placeholder="Children Identifier">
                        @error('identifier')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Children Gender:</strong>
                        <input type="text" name="gender" class="form-control" placeholder="Children Gender">
                        @error('gender')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Children Height:</strong>
                        <input type="text" name="height" class="form-control" placeholder="Children Height">
                        @error('height')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Children Birthday:</strong>
                        <input type="date" name="birthday" class="form-control" value="{{ old('birthday', $child->birthday) }}">
                        @error('birthday')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Children Bloodtype:</strong>
                        <input type="text" name="bloodtype" class="form-control" placeholder="Children Bloodtype">
                        @error('bloodtype')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>