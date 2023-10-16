<!doctype html>
<html>

<head>
    <title>Edit Contact Person</title>
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
    <div class="py-10">
        <h2 class="text-4xl text-center font-bold mb-4 text-blue-500">Edit Contact Person</h2>
        <form action="{{ route('updateContactPerson', ['id' => $contactPerson->id]) }}" method="POST"
            class="max-w-md mx-auto mt-8 p-4 border rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="{{ $contactPerson->name }}"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="city" class="block text-gray-700">City:</label>
                <input type="text" id="city" name="city" value="{{ $contactPerson->city }}"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                @error('city')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="emal" id="email" name="email" value="{{ $contactPerson->email }}"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700">Type:</label>
                <select id="type" name="type"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                    <option value="" disabled>Select a Type</option>
                    @foreach ($types as $value => $label)
                        <option value="{{ $value }}" @if ($contactPerson->type === $value) selected @endif>
                            {{ $label }}</option>
                    @endforeach
                </select>
                @error('type')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="customer" class="block text-gray-700">Customer:</label>
                <select id="customer_id" name="customer_id"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                    <option value="" disabled>Select a Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" @if ($contactPerson->customer_id === $customer->id) selected @endif>
                            {{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('type')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Update</button>
        </form>
    </div>

</body>

</html>
