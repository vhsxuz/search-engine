<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileController extends Controller
{
    public function store(Request $request)
    {


        // Validate the request to ensure a file was uploaded and it's a PDF
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:51200',  // Adjust file type and size as needed
            'title' => 'required|string|max:255', // Validate the title input
        ]);

        // Store the file in the 'uploads' directory in the storage folder
        if ($request->file('file')) {
            $filePath = $request->file('file')->store('uploads', 'public'); // 'public' disk uses storage/app/public

            // Store file details in the database
            File::create([
                'title' => $request->input('title'), // Save the title from the form
                'file_path' => $filePath,
            ]);

            // Return a standardized response structure
            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => [
                    'filePath' => $filePath,
                    'message' => 'File uploaded successfully'
                ]
            ], 200);
        }

        // Handle case where no file was uploaded
        return response()->json([
            'status' => 400,
            'success' => false,
            'data' => [
                'message' => 'No file uploaded'
            ]
        ], 400);
    }
}
