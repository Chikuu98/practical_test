<!doctype html>
<html>

<head>
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
    <div class="p-6 text-gray-600">
        <h2 class="text-4xl font-bold mb-8 text-center text-blue-500">Contact Persons List</h2>
        <div class="mb-4">
            <form action="{{ route('showList') }}" method="GET">
                <label for="search" class="block text-gray-700">Search:</label>
                <div class="flex">
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-400">
                    <button type="submit" class="bg-blue-500 text-white ml-2 px-4 py-2 rounded">Search</button>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            @if (session('success'))
                <div class="bg-green-200 border-l-4 border-green-500 text-green-700 text-center p-4 mb-4 mt-2 rounded-md">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-blue-200">Name</th>
                        <th class="px-4 py-2 bg-gray-200">City</th>
                        <th class="px-4 py-2 bg-gray-200">Email</th>
                        <th class="px-4 py-2 bg-blue-200">Type</th>
                        <th class="px-4 py-2 bg-gray-200">Customer Name</th>
                        <th class="px-4 py-2 bg-blue-200">Edit</th>
                        <th class="px-4 py-2 bg-gray-200">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $contactPerson)
                        <tr>
                            <td class="border px-4 py-2">{{ $contactPerson->name }}</td>
                            <td class="border px-4 py-2">{{ $contactPerson->city }}</td>
                            <td class="border px-4 py-2">{{ $contactPerson->email }}</td>
                            <td class="border px-4 py-2">{{ $contactPerson->type }}</td>
                            <td class="border px-4 py-2">{{ $contactPerson->customer->name }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('editContactPerson', ['id' => $contactPerson->id]) }}"
                                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('deleteContactPerson', ['id' => $contactPerson->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
