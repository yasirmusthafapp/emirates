<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>
<body>
<h1>Product</h1>
@if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
<a href="{{ route('product.create') }}">create product</a>
<table>
    <tr>
        <td>#</td>
        <td>Image</td>
        <td>Name</td>
        <td>Sku</td>
        <td>price</td>
        <td>Action</td>
    </tr>
    @foreach ($products as $item)
<tr>
    <td>{{$loop->iteration}}</td>
    <td><img src="{{ URL::to('/') }}/images/{{ $item->image }}" class="img-thumbnail" width="50" /></td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->sku }}</td>
    <td>{{ $item->price }}</td>
    <td>
        <a class="btn btn-info" href="{{ route('product.show',$item->id) }}" title="Show {{ $item->name }} details">show</a>
        <a class="btn btn-primary" href="{{ route('product.edit',$item->id) }}" title="Edit {{ $item->name }} details">edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $item->id],'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline','title'=>'Delete '.$item->name.' details']) !!}
                                    {{ Form::button('delete', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                                {!! Form::close() !!}
    </td>
</tr>
    @endforeach
</table>
</body>
</html>
