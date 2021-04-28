<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Interfaces\ServiceInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $serviceInterface;

    public function __construct(ServiceInterface $serviceInterface)
    {

        $this->serviceInterface = $serviceInterface;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->serviceInterface->showService($request);
        }
        return view('service.allservice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.addservice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'mobile_no' => 'required'
        ]);
        $status = $this->serviceInterface->addService($request);
        if ($status) {
            return redirect()->route('society.services.index')->with('success', 'Service Added successfully');
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
    public function edit(Service $service)
    {
        return view('service.editservice', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'mobile_no' => 'required'
        ]);
        $status = $this->serviceInterface->updateService($request, $service);
        if ($status) {
            return redirect()->route('society.services.index')->with('success', 'Service Edited successfully');
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
    public function destroy(Service $service)
    {
        $status = $this->serviceInterface->deleteService($service);
        if ($status) {
            return redirect()->back()->with('success', 'Service Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function show_service(Request $request)
    {
        if ($request->ajax()) {
            return $this->serviceInterface->showServiceMem($request);
        }
        return view('service.allservice');
    }
}
