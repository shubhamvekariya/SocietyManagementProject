<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Interfaces\AssetInterface;
use App\Http\Requests\AssetValidation;

class AssetController extends Controller
{
    protected $assetInterface;

    public function __construct(AssetInterface $assetInterface)
    {

        $this->assetInterface = $assetInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return $this->assetInterface->showAsset($request);
        }
        return view('asset.allasset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.addasset');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetValidation $request)
    {
        $status = $this->assetInterface->addAsset($request);
        if ($status) {
            return redirect()->route('member.assets.index')->with('success', 'Asset Added successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return view('asset.editasset', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        $status = $this->assetInterface->updateAsset($request, $asset);
        if ($status) {
            return redirect()->route('member.assets.index')->with('success', 'Assets Edited successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $status = $this->assetInterface->deleteAsset($asset);
        if ($status) {
            return redirect()->back()->with('success', 'Asset Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
