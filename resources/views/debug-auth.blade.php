<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth & Session Debugger</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Auth & Session Debugger</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Auth Status -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Authentication</h2>
                <p class="mb-2"><strong>Status:</strong> 
                    @auth
                        <span class="text-green-600 font-bold">Logged In</span>
                    @else
                        <span class="text-red-600 font-bold">Guest</span>
                    @endauth
                </p>
                <p class="mb-2"><strong>Guard:</strong> {{ Auth::getDefaultDriver() }}</p>
                
                @auth
                    <h3 class="font-bold mt-4 text-sm uppercase text-gray-500">User Data:</h3>
                    <pre class="bg-gray-50 p-3 rounded text-xs overflow-auto">{{ json_encode(Auth::user(), JSON_PRETTY_PRINT) }}</pre>
                @endauth
            </div>

            <!-- Session Data -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Session Store</h2>
                <p class="mb-2"><strong>Session ID:</strong> {{ Session::getId() }}</p>
                <h3 class="font-bold mt-4 text-sm uppercase text-gray-500">All Session Data:</h3>
                <pre class="bg-gray-50 p-3 rounded text-xs overflow-auto">{{ json_encode(Session::all(), JSON_PRETTY_PRINT) }}</pre>
            </div>

            <!-- Request Headers -->
            <div class="bg-white p-6 rounded-lg shadow md:col-span-2">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Request Info (Cookies/Headers)</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-bold text-sm uppercase text-gray-500">Cookies:</h3>
                        <pre class="bg-gray-50 p-3 rounded text-xs overflow-auto">{{ json_encode(request()->cookies->all(), JSON_PRETTY_PRINT) }}</pre>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm uppercase text-gray-500">Relevant Headers:</h3>
                        <pre class="bg-gray-50 p-3 rounded text-xs">
{
  "Authorization": "{{ request()->header('Authorization', 'None') }}",
  "X-CSRF-TOKEN": "{{ request()->header('X-CSRF-TOKEN', 'None') }}",
  "Accept": "{{ request()->header('Accept') }}"
}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>