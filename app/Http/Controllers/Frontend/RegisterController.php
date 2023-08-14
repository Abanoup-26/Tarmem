<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RegisterController extends Controller
{
    use MediaUploadingTrait;

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Organization();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');
        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
