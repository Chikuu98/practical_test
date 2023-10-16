<!doctype html>
<html>

<head>
    <title>Add Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="p-5 bg-blue-200">
        <a href="/add-contact-person">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Add Contact
                Person</button>
        </a>
        <a href="/">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Add
                Customer</button>
        </a>
        <a href="/list">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Go to List</button>
        </a>
    </div>
    @if (session('success'))
        <div class="bg-green-200 border-l-4 border-green-500 text-green-700 text-center p-4 mb-4 mt-2 rounded-md">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="py-10">
        <h2 class="text-4xl text-center font-bold mb-4 text-blue-500">Add New Customer</h2>
        <form action="{{ route('submitCustomer') }}" method="POST"
            class="max-w-md mx-auto mt-8 p-4 border rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Customer Name:</label>
                <input type="text" id="name" name="name" value=""
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="city" class="block text-gray-700">City:</label>
                <input type="text" id="city" name="city" value=""
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                @error('city')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700">Type:</label>
                <select id="type" name="type"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                    <option value="" disabled selected>Select Type</option>
                    @foreach ($types as $value => $label)
                        <option value="{{ $value }}">
                            {{ $label }}</option>
                    @endforeach
                </select>
                @error('type')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Create</button>
        </form>
    </div>

</body>

</html>
