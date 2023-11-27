<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Properties;
use App\Models\Rooms;

class HouseMatesApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Create a new property
     *
     * @param PropertyRequest $request
     * 
     * @return Json|Mixed
     */
    public function propertyStore(PropertyRequest $request): Mixed
    {
        $property = Properties::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Property created successfully!",
            'property' => $property
        ], 200);
        
    }

    /**
     * Edit a property
     *
     * @param PropertyRequest $request
     * 
     * @return Json|Mixed
     */
    public function updateProperty(PropertyRequest $request): Mixed
    {        
        $property = Properties::findOrFail($request->id);

        if($property){
            $property->name = $request->name;
            $property->address = $request->address;
            $property->save();
            return response()->json([
                'status' => true,
                'message' => "Property updated successfully!",
                'property' => $property
            ], 200);
        } else {
            return response()->json(['error' => 'Record not found']); 
        }
        
    }

    /**
     * Delete a property
     *
     * @param Request $request
     * 
     * @return Json|Mixed
     */
    public function deleteProperty(Request $request): Mixed
    {            
        $property = Properties::findOrFail($request->id);

        if($property){
            $property->delete();
            return response()->json([
                'status' => true,
                'message' => "Property deleted successfully!",
                'property' => $property
            ], 200);
        } else {
            return response()->json(['error' => 'Record not found']);
        }  
    }

   /**
     * Create a new property
     *
     * @param PropertyRequest $request
     * 
     * @return Json|Mixed
     */
    public function roomStore(RoomRequest $request): Mixed
    {
        $property = Properties::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Room created successfully!",
            'room' => $room
        ], 200);
        
    }
}
