<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageEnquiryController extends Controller
{
    public function create(string $slug): View
    {
        $package = Package::where('slug', $slug)->where('is_active', true)->first();

        abort_unless($package, 404);

        $intent = request('intent') === 'book' ? 'book' : 'enquire';

        return view('package-enquire', [
            'package' => $package,
            'intent' => $intent,
        ]);
    }

    public function store(Request $request, string $slug): RedirectResponse
    {
        $package = Package::where('slug', $slug)->where('is_active', true)->first();

        abort_unless($package, 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'package_id' => $package->id,
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        return redirect()
            ->route('packages.show', $slug)
            ->with('enquiry_sent', $package->title);
    }
}
