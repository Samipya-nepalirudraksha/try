<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" required>
        <input type="number" name="price" value="{{ $product->price }}" required step="0.01">
        <input type="number" name="quantity" value="{{ $product->quantity }}" required>
        <button type="submit">Update Product</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Products</a>
</body>
</html>
