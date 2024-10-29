<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function updateTitleInput() {
            const fileInput = document.getElementById('dropzone-file');
            const titleInput = document.getElementById('title');
            const uploadStatus = document.getElementById('upload-status');

            // Get the uploaded file's name
            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                titleInput.value = fileName; // Update title input
                uploadStatus.textContent = `Uploaded: ${fileName}`; // Update upload status
                uploadStatus.classList.remove('hidden'); // Show the upload status
            } else {
                uploadStatus.textContent = ''; // Clear the status if no file is selected
                uploadStatus.classList.add('hidden'); // Hide the upload status
            }
        }

        function handleSubmit(event) {
            const fileInput = document.getElementById('dropzone-file');
            const titleInput = document.getElementById('title');
            const uploadStatus = document.getElementById('upload-status');

            // Check if a file is selected
            if (fileInput.files.length === 0) {
                uploadStatus.textContent = 'Please select a file before uploading.';
                uploadStatus.classList.remove('hidden');
                event.preventDefault(); // Prevent form submission
            } else {
                uploadStatus.classList.add('hidden'); // Hide the status if all is good
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-xl font-bold mb-4 text-center">Upload File</h1>
        <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data" onsubmit="handleSubmit(event)">
            @csrf <!-- Generates CSRF token required for form submission -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">File Title:</label>
                <input type="text" name="title" id="title" required class="block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
            </div>

            <div class="flex items-center justify-center w-full mb-4">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX: 50MB)</p>
                    </div>
                    <!-- Added name attribute -->
                    <input id="dropzone-file" type="file" name="file" class="hidden" accept=".pdf" onchange="updateTitleInput()"/>
                </label>
            </div>

            <!-- New element to indicate file upload status -->
            <div id="upload-status" class="mb-4 text-sm text-green-600 hidden"></div>

            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition duration-200">Upload</button>
        </form>
    </div>
</body>
</html>
