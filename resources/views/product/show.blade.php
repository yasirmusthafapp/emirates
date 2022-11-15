<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show product</title>
</head>
<body>
<h1>show product</h1>
<label for="">Name</label>
<strong> {{ $product->name}} </strong><br>
<label for="">SKU</label>
<strong> {{ $product->sku}} </strong><br>
<label for="">Price</label>
<strong> {{ $product->price}} </strong><br>
<label for="">Image</label>
<img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-thumbnail" width="100" />
<a href=" {{ route('product.index')}} ">back</a>
</body>
</html>
