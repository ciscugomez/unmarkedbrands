<?php

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Storage;


trait HasProfilePhoto
{
    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    

    public function updateProfilePhoto(UploadedFile $photo)
    {
        tap($this->profile_photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'profile_photo_path' => $photo->storePublicly(
                    'profile-photos', ['disk' => $this->profilePhotoDisk()]
                ),
            ])->save();
 
            if ($previous) {
               Storage::disk($this->profilePhotoDisk())->delete($previous);
            }
        });
    }
}
?>