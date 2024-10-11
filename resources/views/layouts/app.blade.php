<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- TinyMCE Editor -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tinymce',  // Class to apply TinyMCE to
            plugins: 'image',
            menubar: false
        });
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100">
<!-- Top Menu Bar -->
<nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-center space-x-6">
            <!-- Dropdown Wrapper -->
            <div class="relative" x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false">
                <!-- Master Data Button -->
                <button class="bg-pink-400 text-white py-2 px-4 rounded-md hover:bg-pink-500">
                    Master Data
                </button>

                <!-- Dropdown Items -->
                <ul class="absolute left-0 bg-white shadow-md rounded-md" 
                    x-show="open" 
                    class="hidden group-hover:block">
                    <li>
                        <a href="{{ route('event_categories.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Master Event Category</a>
                    </li>
                    <li>
                        <a href="{{ route('organizers.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Master Organizer</a>
                    </li>
                    <li>
                        <a href="{{ route('events.master_index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Master Event</a>
                    </li>
                </ul>
            </div>

            <!-- Events Button -->
            <a href="{{ route('events.index') }}" class="bg-purple-500 hover:bg-purple-700 text-white py-2 px-4 rounded">
                Events
            </a>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        @yield('content')
    </div>
</body>
</html>
