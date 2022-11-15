<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show product</title>
</head>

<body>
    <h1>Edit product</h1>
    <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-md-4 text-right">Enter First Name</label>
            <div class="col-md-8">
                <input type="text" name="name" value="{{ $product->name }}" class="form-control input-lg" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 text-right">Sku</label>
            <div class="col-md-8">
                <input type="text" name="sku" value="{{ $product->sku }}" class="form-control input-lg" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 text-right">Price</label>
            <div class="col-md-8">
                <input type="text" name="price" value="{{ $product->price }}" class="form-control input-lg" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 text-right">Select Profile Image</label>
            <div class="col-md-8">
                <input type="file" name="image" />
                <img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-thumbnail" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $product->image }}" />
            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
        </div>
    </form>
</body>

</html>
