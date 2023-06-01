<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Writer;

Trait GenerateBarcodeTrait
{
    public function generateBarcode(Request $request)
    {
        // Get the barcode content from the request
        $content = $request->input('content', 'Hello, World!');

        // Set up the barcode writer and renderer
        $writer = new Writer(new ImageRenderer());

        // Generate the barcode as a PNG image
        $pngData = $writer->writeString($content, 'png');

        // Save the PNG image to disk
        $filename = 'barcode.png';
        $path = storage_path('app/public/'.$filename);
        file_put_contents($path, $pngData);

        // Return a response with the URL of the saved image
        return response()->json([
            'url' => asset('storage/'.$filename),
        ]);
    }
}
