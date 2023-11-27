<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Properties;
use App\Models\Rooms;

/*
| The purpose of this class HouseMatesApiController is to receive a JSON API request and
|  also return a JSON API response.
*/
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
     * Update a property
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
     * Create a new room
     *
     * @param RoomRequest $request
     * 
     * @return Json|Mixed
     */
    public function roomStore(RoomRequest $request): Mixed
    {
        $room = Rooms::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Room created successfully!",
            'room' => $room
        ], 200);
        
    }

    /**
     * Update a room
     *
     * @param RoomRequest $request
     * 
     * @return Json|Mixed
     */
    public function updateRoom(RoomRequest $request): Mixed
    {    
        $room = Rooms::findOrFail($request->id);

        if($room){
            $room->property_id = $request->property_id;
            $room->name = $request->name;
            $room->size = $request->size;
            $room->save();
            return response()->json([
                'status' => true,
                'message' => "Room updated successfully!",
                'room' => $room
            ], 200);
        } else {
            return response()->json(['error' => 'Record not found']); 
        }        
    }

    /**
     * Delete a room
     *
     * @param Request $request
     * 
     * @return Json|Mixed
     */
    public function deleteRoom(Request $request): Mixed
    {            
        $room = Rooms::findOrFail($request->id);

        if($room){
            $room->delete();
            return response()->json([
                'status' => true,
                'message' => "Room deleted successfully!",
                'room' => $room
            ], 200);
        } else {
            return response()->json(['error' => 'Record not found']);
        }  
    }
}
