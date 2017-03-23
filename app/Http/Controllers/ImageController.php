<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    public function getPostImages($id)
    {
        $photos = Photo::where('post_id', $id)->get();
        $images = [];
        foreach ($photos as $photo) {
            $name = $photo->getOriginal()['imgPath'];
            $size = Storage::size('public/img/posts/' . $name);
//            dd(url($photo->imgPath));
            $images[] = ['fileName' => $name,
//                'fileUrl' => $photo->imgPath,
                'fileUrl' => url($photo->imgPath),
                'size' => $size,
                'photoId' => $photo->id];
        }
        return response()->json([
            'images' => $images
        ]);
    }

    public function postImageUpload(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|max:512|mimes:jpeg,jpg,bmp,png',
        ]);

        $post = Post::find($request->postId);

        // get file and define name then resize
        $img = $request->file('photo');
        $name = $post->id . time() . '.' . $img->getClientOriginalExtension();
        $resizedImg = Image::make($img)->resize(250, 250);

        $watermark = Image::make(public_path('img/watermark.png'))->resize(240, 60);
        $resizedImg->insert($watermark, 'bottom-right', 0, 0);

        // then store new picture
        $storagePath = 'public/img/posts/' . $name;
        $saveRes = Storage::put($storagePath, $resizedImg->stream());

        if ($saveRes) {
            $photo = new Photo([
                'post_id' => $post->id,
                'imgPath' => $name
            ]);

            if ($photo->save()) {
                return response()->json(['success' => true, 'photoId' => $photo->id, 'code' => 200], 200);
            } else {
                return response()->json(['success' => false, 'code' => 400], 400);
            }
        } else {
            return response()->json(['success' => false, 'code' => 400], 400);
        }
    }

    public function postImageDelete()
    {
        $photoId = Input::get('photoId');
        $photo = Photo::find($photoId);
        if ($photo) {
            $oldFilePath = 'public/img/posts/' . $photo->getOriginal()['imgPath'];
//            dd($oldFilePath);
            $result = Storage::delete($oldFilePath);
//            dd($result);
            if ($result) {
                Photo::destroy($photoId);
                return response()->json(['success' => true, 'code' => 200], 200);
            } else {
                return response()->json(['success' => false, 'code' => 400], 400);
            }
        } else {
            return response()->json(['success' => false, 'code' => 400], 400);
        }
    }

    public function profileImageUpload(Request $request, User $user)
    {
        $this->validate($request, [
            'photo' => 'required|image|max:512|mimes:jpeg,jpg,bmp,png',
        ]);

        // get file and define name then resize
        $img = $request->file('photo');
        $name = time() . '.' . $img->getClientOriginalExtension();
        $resizedImg = Image::make($img)->resize(250, 250);

        $watermark = Image::make(public_path('img/watermark.png'))->resize(240, 60);
        $resizedImg->insert($watermark, 'bottom-right', 0, 0);

        // first delete old picture
        if ($user->photo) {
            $oldFilePath = 'public/img/users/' . $user->getOriginal()['photo'];
            Storage::delete($oldFilePath);
        }

        // then store new picture
        $storagePath = 'public/img/users/' . $name;
        $saveRes = Storage::put($storagePath, $resizedImg->stream());

        if ($saveRes) {
            $updateRes = $user->update(['photo' => $name]);
            if ($updateRes) {
                // attention!!!! here you must return a url to the view!!!!
                // DO NOT quote
                return response()->json(['success' => true, 'filePath' => url($user->photo)], 200);
            } else {
                return response()->json(['success' => false, 'msg' => 'Failed to update image'], 200);
            }
        } else {
            return response()->json(['success' => false, 'msg' => 'Failed to save image'], 200);
        }
    }
}
