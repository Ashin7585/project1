<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Customer</h2>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input type="text" id="customerName" name="customerName" value="{{ $customer->name }}" required>
                @if ($errors->has('customerName'))
                    <div class="error">{{ $errors->first('customerName') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="customerAddress">Customer Address</label>
                <textarea id="customerAddress" name="customerAddress" rows="4" required>{{ $customer->address }}</textarea>
                @if ($errors->has('customerAddress'))
                    <div class="error">{{ $errors->first('customerAddress') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="contactNo">Contact Number</label>
                <input type="number" id="contactNo" name="contactNo" value="{{ $customer->contact_no }}" required>
                @if ($errors->has('contactNo'))
                    <div class="error">{{ $errors->first('contactNo') }}</div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
