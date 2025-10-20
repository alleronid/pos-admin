<?php

namespace App\Repositories;

use Abedin\Maker\Repositories\Repository;
use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository extends Repository
{
    public static function model()
    {
        return Media::class;
    }

    public static function storeByRequest(UploadedFile $file, string $path, string $type = 'Image'): Media
    {
        $extension = $file->extension();
        $path = self::putFile($file, $path);
        if (!$type) {
            $type = in_array($extension, ['jpg', 'png', 'jpeg', 'gif']) ? 'Image' : $extension;
        }

        return self::create([
            'type' => $type,
            'src' =>  $path,
        ]);
    }

    public static function updateByRequest(UploadedFile $file, string $path, string $type = 'Image', Media $media): Media
    {
        $extension = $file->extension();
        $path = self::putFile($file, $path);
        if (!$type) {
            $type = in_array($extension, ['jpg', 'png', 'jpeg', 'gif']) ? 'Image' : $extension;
        }

        if (Storage::exists($media->src)) {
            Storage::delete($media->src);
        }

        self::update($media, [
            'type' => $type,
            'src' =>  $path,
        ]);
        return $media;
    }

    public static function updateOrCreateByRequest(UploadedFile $file, string $path, string $type = 'Image', $media = null): Media
    {
        $extension = $file->extension();
        $src = self::putFile($file, $path);
        if ($media && Storage::exists($media->src)) {
            Storage::delete($media->src);
        }

        if (!$type) {
            $type = in_array($extension, ['jpg', 'png', 'jpeg', 'gif']) ? 'Image' : $extension;
        }
        return self::query()->updateOrCreate([
            'id' => $media?->id ?? 0,
        ], [
            'type' => $type,
            'src' => $src,
            'extension' => $extension,
            'path' => $path,
        ]);
    }

    private static function putFile(UploadedFile $file, string $path)
    {
        $location = config('filesystems.default');
        if ($location == 'public') {
            return Storage::put('/' . trim($path, '/'), $file, 'public');
        }

        $path = trim('/uploaded' . $path, '/');
        $name = str()->random(50) . '.' . $file->extension();
        $file->move(public_path(path: $path), $name);
        return $path . '/' . $name;
    }
}
