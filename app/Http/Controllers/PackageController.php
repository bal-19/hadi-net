<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $packages = Package::filter($request->only('search'))->latest()->paginate(10)->withQueryString();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.form-package');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role != 'super admin') {
            abort(404);
        }

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'bandwidth' => 'required|integer',
            'duration' => 'required|integer|max:12',
            'price' => 'required|numeric',
            'desc' => 'required|string'
        ]);

        $duplicate = Package::where('name', $validate['name'])
            ->where('bandwidth', $validate['bandwidth'])
            ->where('duration', $validate['duration'])
            ->where('price', $validate['price'])
            ->exists();

        if ($duplicate) {
            return redirect()->route('packages.index')->with('error', 'Package with same name, bandwidth, duration, and price already exists.');
        }

        Package::create($validate);

        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }


    public function edit(Package $package)
    {
        if (Auth::user()->role != 'super admin') {
            abort(404);
        }

        return view('admin.packages.form-package', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        if (Auth::user()->role != 'super admin') {
            abort(404);
        }

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'bandwidth' => 'required|integer',
            'duration' => 'required|integer|max:12',
            'price' => 'required|numeric',
            'desc' => 'required|string'
        ]);

        $package->update($validate);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully!');
    }

    public function destroy(Package $package)
    {
        if (Auth::user()->role != 'super admin') {
            abort(404);
        }

        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully!');
    }
}
