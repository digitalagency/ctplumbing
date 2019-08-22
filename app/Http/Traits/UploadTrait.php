<?php
namespace App\Http\Traits;

use Intervention\Image\ImageManager;

trait UploadTrait
{

    /**
    * upload image
    * @param $file type file
    * return filename;
    */
    public function upload($file)
    {
        if($file == null){
            return;
        }
        try{

            $mime_type = $file->getClientOriginalExtension();
            $filename = hash('md5', microtime()).'.'.$mime_type;
            $location = base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR;
            $manager = new ImageManager();
            $image = $manager->make($file)->save($location . $filename);

            return $filename;
            
        } catch(\Exception $ex) {
            return back()->withErrors($ex.getMessage());
        }        
    }

    /**
    * crop image, fit
    * @param $file type file
    * @param int width, int height
    * return filename;
    */
    public function createThumbnail($file, $width=null, $height=null, $location=null)
    {
        try{

            //$filename = $file->getClientOriginalName();
            $mime_type = $file->getClientOriginalExtension();
            $filename = hash('md5', microtime()).'.'.$mime_type;
            //if crop size exist
            $manager = new ImageManager();
            if ($location == null) {
                $location = base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR;
            }
            if ($width != null && $height != null) {
                $image = $manager->make($file)->fit($width, $height)
                ->save($location . $filename);
            } else {
                $image = $manager->make($file)->save($location . $filename);
            }

            return $filename;
        } catch(\Exception $ex) {
            return back()->withErrors($ex.getMessage());
        }   
        
    }

    /**
    * check is file exists
    * @param $filename
    * @param string $folder default is uploads
    * @return boolean
    */
    public static function isImageExists($filename, $folder=null)
    {
        if (!empty($filename)) {
            if ($folder==null) {
                $path = base_path() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .'uploads' . DIRECTORY_SEPARATOR.$filename;
            } else {
                $path = base_path() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .$folder . DIRECTORY_SEPARATOR.$filename;
            }

            if (File::exists($path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * delete image fromo folder
     * after delete image doesnot exists permanently
     *
     * @param string $filename
     * @param string $folder
     * @return void
     */
    public function deleteImage($filename, $folder=null)
    {
        if ($folder==null) {
            $folder = "uploads";
        }
    
        $full_path = base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$filename;
        $icon_path = base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'icons'.DIRECTORY_SEPARATOR.$filename;
        if (File::exists($full_path)) {
            File::delete($full_path);
        }
        if (File::exists($icon_path)) {
            File::delete($icon_path);
        }
    }

   

    /**
    * stores given image with size in predefined icons folder
    * @param $file = Image
    * @param $filename = filename stored in database
    * @param $location is folder path
    * @param $width $height crop size
    **/
    public function createIcon($file, $filename=null, $location=null, $width=null, $height=null)
    {
        //$filename = $file->getClientOriginalName();
        $mime_type = $file->getClientOriginalExtension();
          
        if ($filename==null) {
            $filename = hash('md5', microtime()).'.'.$mime_type;
        }

        //if crop size exist
        $manager = new ImageManager();
        if ($location == null) {
            $location =  base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'icons'.DIRECTORY_SEPARATOR;
        }
        if ($width == null && $height == null) {
            $width = 200;
            $height = 200;
        }

        $image = $manager->make($file)->fit($width, $height)
              ->save($location . $filename);
        if ($image) {
            return $filename;
        }
    }

    /*
    *  delete entire files from folder
    *  @return boolen
    */
    public function deleteFolder($array)
    {
        $return = false;
        if (is_object($array)) {
            foreach ($array as $value) {
                $this->destroyFiles($value->filename);
            }
            $return = true;
        }
        return $return;
    }
}
