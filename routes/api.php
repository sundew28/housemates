<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\HouseMatesApiController;
use App\Models\Properties;
use App\Models\Rooms;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Routes to generate the JWT token 
 */
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

/*
 * Routes to generate JSON responses
 */
Route::controller(HouseMatesApiController::class)->group(function () {

    // Property API endpoints
    
    // List all properties
    Route::get('/property', function (Properties $properties) {        
        return response()->json($properties->all());      
    });

    // Create new property
    Route::post('/property', 'propertyStore');

    // Edit a property
    Route::put('/property', 'updateProperty');

    // Delete a property
    Route::delete('/property', 'deleteProperty');

    // Rooms API endpoints
    
    // List all rooms for specific property
    Route::get('/room', function (Request $request, Rooms $rooms) {
        $rooms = $rooms->where('property_id', $request->propertyId)->get();
        if ($rooms->isEmpty()) {
            $jsonArray = ["error" => "Rooms not found for property ID: ".$request->propertyId." or property doesn't exist."];
            return response()->json($jsonArray);
        } else {
            return response()->json($rooms);
        }       
    });

    // Create new property
    Route::post('/room', 'roomStore');

    // Edit a room
    Route::put('/room', 'updateRoom');

    // Delete a room
    Route::delete('/room', 'deleteRoom');
});