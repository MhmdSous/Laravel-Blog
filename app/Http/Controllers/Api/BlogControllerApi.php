<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Traits\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogControllerApi extends Controller
{
    use Image;
    use GeneralTrait;


    public function index(Request $request)
    {
        // Validate the 'lang' parameter
        $validator = Validator::make($request->all(), [
            'lang' => 'in:ar,en',
        ]);

        if ($validator->fails()) {
            return $this->returnError('Invalid language parameter');
        }

        $lang = $request->input('lang', 'en');

        $data = BlogPost::latest()->get();

        if ($data->isEmpty()) {
            return $this->returnError('No blog posts available');
        }

        return $this->sendResponse($data->map->getBlogPostAttribute($lang), 'Successfully fetched blog posts');
    }

    public function show(Request $request, $id)
    {
        // Validate the 'lang' parameter
        $validator = Validator::make($request->all(), [
            'lang' => 'in:ar,en',
        ]);

        if ($validator->fails()) {
            return $this->returnError('Invalid language parameter');
        }

        $lang = $request->input('lang', 'ar');

        $data = BlogPost::find($id);

        if (!$data) {
            return $this->returnError('Blog post not found');
        }

        return $this->sendResponse($data->getBlogPostAttribute($lang), 'Successfully fetched blog post');
    }



    public function store(Request $request)
    {

        // Validation rules
        $validator = Validator::make($request->all(), [
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|integer',

        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return $this->returnError('Validation error', $validator->errors());
        }

        // Create a new blog post
        $data = BlogPost::create([
            'user_id' => $request->user_id, // Use the authenticated user's ID
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'body_ar' => $request->body_ar,
            'body_en' => $request->body_en,
            // 'user_id' => Auth::id(),
        ]);

        // Handle image upload using the Image trait
        if ($request->hasFile('image')) {
            $imagePath = $this->storeImage($request, 'image', 'blog');
            if ($imagePath) {
                $data->image = $imagePath;
                $data->save();
            }
        }

        if (!$data) {
            return $this->returnError('Something went wrong', 'Failed to create a new blog post');
        }

        return $this->sendResponse($data, 'Successfully created a new blog post');
    }


    public function destroy($id)
    {
        $data = BlogPost::find($id);

        if (!$data) {
            return $this->returnError('Blog post not found');
        }

        $data->delete();

        return $this->sendResponse($data, 'Successfully deleted blog post');
    }



    public function update(Request $request, $id)
    {
        $data = BlogPost::find($id);

        if (!$data) {
            return $this->returnError('Blog post not found');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->returnError('Validation failed', $validator->errors());
        }

        // Store the current image path for later deletion
        $currentImagePath = $data->image;

        // Update the blog post data
        $data->title_ar = $request->title_ar;
        $data->title_en = $request->title_en;
        $data->body_ar = $request->body_ar;
        $data->body_en = $request->body_en;
        // $data->user_id = $request->user_id;

        // Handle the image update
        if ($request->hasFile('image')) {
            $newImagePath = $this->updateImage($request, $data, 'image', 'blog');

            if (!$newImagePath) {
                return $this->returnError('Image upload failed');
            }

            // Delete the old image
            $this->deleteImage($currentImagePath, 'public');
            $data->image = $newImagePath;
        }

        // Save the updated blog post
        $data->save();

        return $this->sendResponse($data, 'Successfully updated blog post');
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return $this->returnError('Unauthorized');
        }

        return $this->sendResponse(['token' => $token], 'Successfully logged in');
    }
}
