<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\CardController;
use App\Http\Controllers\API\StepsController;

//getting all models
use App\Models\Service;
use App\Models\Steps;
use App\Models\Card;

Route::post('/login', [AuthController::class, 'apiLogin']);

//Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

Route::get('/', function () {
    return response()->json([
        'services' => Service::all(),
        'cards' => Card::all(),
        'steps' => Steps::all()
        ]);
});
Route::apiResource('services', ServiceController::class)->names('api.services');
Route::apiResource('cards', CardController::class)->names('api.cards');
Route::apiResource('steps', StepsController::class)->names('api.steps');

// Test routes for API
// Create a new user
/* Route::post('/test', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);
    $validated['password'] = bcrypt($validated['password']);
    $user = User::create($validated);

    return response()->json($user);
});

// Get all users
Route::get('/test/data', function () {
    $users = User::all();
    return response()->json($users);
});


// Get a specific user by ID
Route::get('/test/data/{id}', function ($id) {
    $user = User::find($id);
    return response()->json($user);
});

// Update a user by ID
Route::patch('/test/data/{id}', function (Request $request, $id) {

$user = User::find($id);
    if ($user) {
        $validated = $request->validate([
            'name' => 'string|max:255'
        ]);
        $user->update($validated);
        return response()->json($user);
    }

    return response()->json(['message' => 'User not found'], 404);
});

// Delete a user by ID
Route::delete('/test/data/{id}', function ($id) {
    $user = User::find($id);
    if ($user) {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
    return response()->json(['message' => 'User not found'], 404);
}); */



//});
