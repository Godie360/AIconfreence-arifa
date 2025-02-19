<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExhibitionMap;
use App\Models\Booth;
use App\Models\Label;
use Illuminate\Support\Facades\Log;

class ExhibitionMapController extends Controller
{

    public function saveLayout(Request $request)
    {
        $booths = $request->input('booths', []);
        $labels = $request->input('labels', []);

        // Save booths
        foreach ($booths as $booth) {
            Booth::updateOrCreate(
                [
                    'booth_name' => $booth['name'],
                    'map_id' => $booth['map_id'],
                ],
                [
                    'status' => $booth['status'],
                    'price' => $booth['price'],
                    'position_x' => $booth['position_x'],
                    'position_y' => $booth['position_y'],

                    'transform_x' => $booth['transform_x'],
                    'transform_y' => $booth['transform_y'],

                    'description' => $booth['description'],
                    // Add other necessary fields
                ]
            );
        }

        // Save labels
        foreach ($labels as $label) {
            Label::updateOrCreate(
                [
                    'label_name' => $label['name'],           // Save the label name
                    'map_id' => $label['map_id'],
                ],
                [
                    'color' => $label['color'],               // Save the label color
                    'label_description' => $label['description'], // Save the label description
                    'position_x' => $label['position_x'],     // Save the X position
                    'position_y' => $label['position_y'],     // Save the Y position

                    'transform_x' => $label['transform_x'],
                    'transform_y' => $label['transform_y'],
                ]
            );
        }

        return response()->json(['message' => 'Layout saved successfully!'], 201);
    }




















    // work
    public function save_new_map(Request $request)
    {
        // dd($request);
        // Validate the request data
        $validatedData = $request->validate([
            'map_name' => 'required|string',
            'map_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate as image
        ]);

        // Handle file upload
        $fileName = 'floor_map_plan_' . time() . '.' . $request->file('map_image')->extension(); // Create a unique filename
        $request->file('map_image')->move(public_path('exhibition/maps'), $fileName); // Move to public/maps folder

        // Create a new ExhibitionMap
        $map = ExhibitionMap::create([
            'map_name' => $request->input('map_name'),
            'map_image' => $fileName, // Save the file name (not the full path)
        ]);

        return redirect()->back()->with('success', 'Map Successfully Created');
    }

    // booth
    public function save_booth(Request $request)
    {
        // dd($request);
        // Validate the request data
        $validatedData = $request->validate([
            'booth_name' => 'required|string|max:255',
            'map_id' => 'required|exists:exhibition_maps,id', // Ensure the map exists
            'status' => 'required|string',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'icon' => 'file|mimes:jpeg,png,pdf|max:4048', // Validate file type and size
            'position_x' => 'required|numeric', // X position
            'position_y' => 'required|numeric',  // Y position
        ]);

        // Step 2: Get the uploaded student ID file
        $icon = $request->file('icon');

        // Step 3: Define the destination path
        $destinationPath = public_path('assets/images/exhibition/icon'); // Path to store the file

        // Step 4: Generate a custom filename using the registration ID
        $booth_icon = 'booth_icon_' . $request['map_id'] . time() . '.' . $icon->getClientOriginalExtension();

        // Step 5: Move the file to the destination directory
        try {
            $icon->move($destinationPath, $booth_icon);
        } catch (\Exception $e) {
            // Handle file storage errors
            // dd("hola");
            return back()->withErrors(['file_error' => 'File could not be uploaded. Please try again.']);
        }


        // Create a new Booth
        Booth::create([
            'booth_name' => $validatedData['booth_name'],
            'map_id' => $validatedData['map_id'],
            'status' => $validatedData['status'],
            'price' => $validatedData['price'] ?? null,
            'position_x' => $validatedData['position_x'],
            'position_y' => $validatedData['position_y'],
            'description' => $validatedData['description'] ?? '',
            'booth_icon' => $booth_icon ?? '',
        ]);

        return response()->json(['success' => 'Booth Saved successfully!']);
    }


    // labels
    public function save_label(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'label_map_id' => 'required|exists:exhibition_maps,id', // Ensure the map exists
            'labelName' => 'required|string|max:255', // Label name validation
            'l_position_x' => 'required|numeric', // X position
            'l_position_y' => 'required|numeric', // Y position
            'color' => 'required|string', // Label color
            'description' => 'nullable|string|max:255', // Optional description
        ]);


        // dd("holla");

        // Create a new Label
        Label::create([
            'label_name' => $validatedData['labelName'], // Using the validated label name
            'map_id' => $validatedData['label_map_id'], // Using the validated map ID
            'color' => $validatedData['color'], // Using validated color
            'label_description' => $validatedData['description'] ?? '', // Optional description
            'position_x' => $validatedData['l_position_x'], // Using validated position X
            'position_y' => $validatedData['l_position_y'], // Using validated position Y
        ]);

        return response()->json(['success' => 'Label saved successfully!']);
    }


    public function update_map(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'map_id' => 'required|exists:exhibition_maps,id', // Ensure the map exists
            'map_name' => 'required|string|max:255', // Map name validation
            'map_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation (optional)
        ]);

        // Find the existing map by ID
        $map = ExhibitionMap::find($validatedData['map_id']);

        // Update the map name
        $map->map_name = $validatedData['map_name'];

        // Handle image upload if a new image is provided
        if ($request->hasFile('map_image')) {
            // Generate a unique file name for the new image
            $fileName = time() . '.' . $request->file('map_image')->extension();

            // Move the uploaded file to the public/exhibition/maps directory
            $request->file('map_image')->move(public_path('exhibition/maps'), $fileName);

            // Optionally, you could delete the old image file here if necessary
            if ($map->map_image && file_exists(public_path('exhibition/maps/' . $map->map_image))) {
                unlink(public_path('exhibition/maps/' . $map->map_image)); // Delete the old image
            }

            // Update the map image with the new file name
            $map->map_image = $fileName;
        }

        // Save the updated map to the database
        $map->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Map Successfully Updated');
    }

    public function fetch_booth_and_labels($mapId)
    {
        // dd($mapId);
        // Fetch booths and labels related to the selected map
        $booths = Booth::where('map_id', $mapId)->get();
        $labels = Label::where('map_id', $mapId)->get();

        // Return as JSON response
        return response()->json([
            'booths' => $booths,
            'labels' => $labels
        ]);
    }


    // function ya kusearch booth as user typing
    public function searchBooths(Request $request)
    {
        $query = $request->get('query');
        $booths = Booth::where('booth_name', 'LIKE', "%{$query}%")->get(); // Fetch matching booth names

        return response()->json($booths);
    }
}
