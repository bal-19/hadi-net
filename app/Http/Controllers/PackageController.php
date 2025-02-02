<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function listForUser()
    {
        $packages = Package::all();
        return view('user.orders.index', compact('packages'));
    }

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
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'bandwidth' => 'required|integer',
            'duration' => 'required|integer|max:12',
            'price' => 'required|numeric',
            'desc' => 'required|string'
        ]);

        Package::create($validate);

        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.form-package', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
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
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully!');
    }
}
