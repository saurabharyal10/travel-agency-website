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
        $package = collect(require resource_path('data/packages.php'))
            ->firstWhere('slug', $slug);

        abort_unless($package, 404);

        $intent = request('intent') === 'book' ? 'book' : 'enquire';

        return view('package-enquire', [
            'package' => $package,
            'intent' => $intent,
        ]);
    }

    public function store(Request $request, string $slug): RedirectResponse
    {
        $package = collect(require resource_path('data/packages.php'))
            ->firstWhere('slug', $slug);

        abort_unless($package, 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $packageId = Package::where('slug', $slug)->value('id');

        $message = $validated['message'];

        if (! $packageId) {
            // The public site's package pages still read from the static
            // resources/data/packages.php file rather than the packages
            // table, so there's often no matching row to relate to yet.
            // Keep the package identified in the message text either way.
            $message = "Package: {$package['title']} ({$slug})\n\n{$message}";
        }

        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'package_id' => $packageId,
            'message' => $message,
            'status' => 'new',
        ]);

        return redirect()
            ->route('packages.show', $slug)
            ->with('enquiry_sent', $package['title']);
    }
}
