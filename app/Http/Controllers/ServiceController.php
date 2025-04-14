<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Service::where('status', 1)->paginate(10);
        return view('admin.service.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create')->with('pageTitle', 'Create Service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate basic service fields
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'service_slug' => 'required|unique:services,service_slug',
        'short_description' => 'nullable|string|max:255',
        'long_description' => 'nullable|string',
        'price' => 'required|numeric',
        'status' => 'required|boolean',
        'image' => [
            'nullable',
            'array',
            function ($attribute, $value, $fail) use ($request) {
                if ($request->hasFile('image')) {
                    foreach ($request->file('image') as $image) {
                        $sizeInKB = $image->getSize() / 1024;
                        if ($sizeInKB < 10) {
                            $fail('Each ' . $attribute . ' must be at least 10 KB.');
                        }
                    }
                }
            },
        ],
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
    ]);

    $product_image = [];

    if ($request->hasFile('images')) {
        $folder = "services";
        $destinationPath = '/uploads/' . $folder . "/";

        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($destinationPath), $filename);
            $product_image[] = url($destinationPath . $filename);
        }

        $validatedData['images'] = implode('|', $product_image);
    }

    // Handling Key Features (tax_title[] and tax_description[])
    $keyFeatures = [];
    if ($request->has('tax_title') && $request->has('tax_description')) {
        foreach ($request->tax_title as $index => $title) {
            $desc = $request->tax_description[$index] ?? '';
            $keyFeatures[] = [
                'title' => $title,
                'description' => $desc,
            ];
        }
        $validatedData['key_feature'] = json_encode($keyFeatures);
    }

    // Handling How It Works (question[] and answer[])
    $howItWorks = [];
    if ($request->has('question') && $request->has('answer')) {
        foreach ($request->question as $index => $title) {
            $desc = $request->answer[$index] ?? '';
            $howItWorks[] = [
                'question' => $title,
                'answer' => $desc,
            ];
        }
        $validatedData['how_to_work'] = json_encode($howItWorks);
    }

    // Optional: Remove unwanted fields if needed
    unset($validatedData['_token'], $validatedData['tax']);

    // Save to database
    Service::create($validatedData);

    return redirect()->route('admin.service.index')->with('message', 'Service created successfully.');
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($service_id)
    {
        $serviceData = Service::findOrFail($service_id);
        return view('admin.service.create', compact('serviceData'))->with('pageTitle', 'Edit Service');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
{
    // Validate incoming data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'service_slug' => 'required|unique:services,service_slug,' . $service->id,
        'short_description' => 'nullable|string|max:255',
        'long_description' => 'nullable|string',
        'price' => 'required|numeric',
        'status' => 'required|boolean',
        'image' => [
            'nullable',
            'array',
            function ($attribute, $value, $fail) use ($request) {
                if ($request->hasFile('image')) {
                    foreach ($request->file('image') as $image) {
                        $sizeInKB = $image->getSize() / 1024;
                        if ($sizeInKB < 10) {
                            $fail('Each ' . $attribute . ' must be at least 10 KB.');
                        }
                    }
                }
            },
        ],
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
    ]);

    // Add tax if available
    $validatedData['tax'] = $request->input('tax');

    // Handle image uploads
    $product_image = [];

    if ($request->hasFile('image')) { // Correct input is 'image'
        $folder = "services";
        $destinationPath = '/uploads/' . $folder . "/";

        foreach ($request->file('image') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($destinationPath), $filename);
            $product_image[] = url($destinationPath . $filename);
        }

        $validatedData['images'] = implode('|', $product_image);
    } else {
        // If no new images are uploaded, retain existing ones
        $validatedData['images'] = $service->images;
    }

    // Handle Key Features
    $keyFeatures = [];
    if ($request->has('tax_title') && $request->has('tax_description')) {
        foreach ($request->tax_title as $index => $title) {
            $desc = $request->tax_description[$index] ?? '';
            $keyFeatures[] = [
                'title' => $title,
                'description' => $desc,
            ];
        }
        $validatedData['key_feature'] = json_encode($keyFeatures);
    }

    // Handle How It Works
    $howItWorks = [];
    if ($request->has('question') && $request->has('answer')) {
        foreach ($request->question as $index => $title) {
            $desc = $request->answer[$index] ?? '';
            $howItWorks[] = [
                'question' => $title,
                'answer' => $desc,
            ];
        }
        $validatedData['how_to_work'] = json_encode($howItWorks);
    }

    // Optional: Remove unwanted fields
    unset($validatedData['_token']);
// dd($validatedData);
    // Update the service
    $service->update($validatedData);

    return redirect()->route('admin.service.index')->with('message', 'Service updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete images from storage
        $images = json_decode($service->images, true) ?? [];
        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }

        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }
    public function getSlug(Request $request)
    {
        $slug = Str::slug($request->title);
        return response()->json(['status' => true, 'slug' => $slug]);
    }
    public function show($slug)
    {
        $services = Service::where('service_slug', $slug)->first();
        return view('frontend.services', compact('services'));
    }

}
