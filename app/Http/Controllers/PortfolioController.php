<?php

namespace App\Http\Controllers;

use App\DataTables\PortfolioDataTable;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioDataTable $dataTable)
    {
        return $dataTable->render('pages.portfolio');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.portfolio-action', ['portfolio' => new Portfolio()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {
        $requestData = $request->all();
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/' . $path;
        Portfolio::create($requestData);
        return response()->json([
            'title' => 'Created',
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('pages.portfolio-action', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->title = $request->title;
        $portfolio->date = $request->date;

        if ($request->hasFile('image')) {
            $destination = 'storage/images/' . $portfolio->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . $extension;
            $file->move('storage/images/', $filename);
            $requestData = '/storage/images/' . $filename;
            $portfolio->image = $requestData;
        }
        $portfolio->save();

        return response()->json([
            'title' => 'Updated',
            'status' => 'success',
            'message' => 'Update portfolio successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
