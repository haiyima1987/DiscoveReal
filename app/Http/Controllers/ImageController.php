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
            'photo' => 'required|image|max:1024|mimes:jpeg,jpg,bmp,png',
        ]);

        $post = Post::find($request->postId);

        // get file and make file
        $img = $request->file('photo');
        $image = Image::make($img);

        // resize images according to orientation
        $thumbImg = Image::make($img);
        if ($image->height() <= $image->width()) {
            $thumbImg = $thumbImg->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } else {
            $thumbImg = $thumbImg->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        // add watermark
        $watermark = Image::make(public_path('img/watermark.png'))->resize(240, 60);
        $thumbImg->insert($watermark, 'bottom-right', 0, 0);
        $image->insert($watermark, 'bottom-right', 0, 0);

        // generate new name and store original picture
        $imgName = $post->id . time() . '.' . $img->getClientOriginalExtension();
        $storagePath = 'public/img/posts/' . $imgName;
        $saveResImg = Storage::put($storagePath, $image->stream());

        // generate new thumbnail name and store thumbnail image
        $thumbName = $post->id . 'thumbnail' . time() . '.' . $img->getClientOriginalExtension();
        $storagePath = 'public/img/posts/' . $thumbName;
        $saveResThumb = Storage::put($storagePath, $thumbImg->stream());

        if ($saveResImg && $saveResThumb) {
            $photo = new Photo([
                'post_id' => $post->id,
                'imgPath' => $imgName,
                'thumbnailPath' => $thumbName
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
        // find photo data according to dropzone returned photo ID
        $photoId = Input::get('photoId');
        $photo = Photo::find($photoId);
        if ($photo) {

            // find and delete old pictures
            $oldImgPath = 'public/img/posts/' . $photo->getOriginal()['imgPath'];
            $oldThumbPath = 'public/img/posts/' . $photo->getOriginal()['thumbnailPath'];
            $imgRes = Storage::delete($oldImgPath);
            $thumbRes = Storage::delete($oldThumbPath);

            if ($imgRes && $thumbRes) {
                // delete photo record
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
