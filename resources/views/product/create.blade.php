<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create product</title>
</head>

<body>
    <h1>create product</h1>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">

        @csrf
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="">Name</label>
        <input type="text" name="name">
        <label for="">Sku</label>
        <input type="text" name="sku">
        <label for="">Price</label>
        <input type="text" name="price">
        <label for="">Price</label>
        <input type="file" name="image" />
        <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
    </form>
</body>

</html>
