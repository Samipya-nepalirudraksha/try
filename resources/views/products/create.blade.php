<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" name="price" placeholder="Price" required step="0.01">
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button type="submit">Add Product</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Products</a>
</body>
</html>
