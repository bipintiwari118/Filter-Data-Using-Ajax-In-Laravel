<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>Add Products</h1>
    </center>

    <div class="container" style="height: 500px;width:500px;border-radius:10px;">


        <form method="post" action="{{ route('product.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">

            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Descriptions</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
            <div class="mb-3">
                <select class="form-select" id="category_id" name="category_id">
                    <option selected>Select Category</option>
                    @foreach ($category as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
