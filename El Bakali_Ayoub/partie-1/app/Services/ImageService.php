<?php
namespace App\Services;

use App\Models\ImageMotivation;

class ImageService 
{
    public function getImagesWithSupportMotivations()
    {
        return ImageMotivation::with(['employe','supportMotivations.typeMotivations '])->get();
    }
    public function incrementImageViews(ImageMotivation $image)
    {
       $image->increment('views');
    }
    public function incrementSupportViews (ImageMotivation $image)
    {
        $image->supportMotivations->each(function ($supportMotivation){
            $supportMotivation->increment('views');
        });
    }

}