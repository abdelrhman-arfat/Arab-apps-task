<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Filtered Products</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 20px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        .status-available {
            color: green;
            font-weight: bold;
        }

        .status-unavailable {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Filtered Product List</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td class="{{ $product->status ? 'status-available' : 'status-unavailable' }}">
                        {{ $product->status ? 'Available' : 'Not Available' }}
                    </td>
                    <td>{{ $product->category_name ?? 'Unknown' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
