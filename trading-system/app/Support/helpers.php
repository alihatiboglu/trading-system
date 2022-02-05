<?php


function checkOwnPermitted($item, $prefix, $perm, $mode = 0)
{
    $logged = auth()->user();

    if ($logged->hasRole('superadmin')) {
        return true;
    } elseif ($logged->can($prefix . '.view') && $logged->can($prefix . '.' . $perm)) {

        if (($mode == 1 && ($item->branch_id == $logged->branch_id)) ||
            ($mode == 0 && $item->staff && ($item->staff->branch_id == $logged->branch_id))) {
            return true;
        }

    } elseif ($logged->can($prefix . '.viewOwn') && $logged->can($prefix . '.' . $perm)) {
        if (($mode == 0 ) && $item->staff  && ($item->staff->id == $logged->id)) {
            return true;
        }
    }

    return false;
}



function checkPermitted($key)
{
    return in_array($key, auth()->user()->getAllPermissions()->pluck('name')->toArray());
}


function exportPDF($items, $view, $title,  $save = false, $path = '')
{

    $html = view($view, compact('items', 'title'))->render();

    $mpdf = new \Mpdf\Mpdf([
        'default_font' => 'frutiger',
        'tempDir' => __DIR__ . '/tmp',
        // 'orientation' => 'A4'

    ]);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle($title);
    $mpdf->autoScriptToLang = true;
    $mpdf->baseScript = 1;
    $mpdf->autoVietnamese = true;
    $mpdf->autoArabic = true;
    $mpdf->autoLangToFont = true;
    $mpdf->showImageErrors = true;
    $mpdf->SetDirectionality('rtl');
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);

    if ($save) {
        $mpdf->Output($path, 'F');
    } else {
        $mpdf->Output($title . '.pdf', 'D');
    }

}

function exportExcel($items, $ext='xls',  $file_name, $sheet, $save=false, $path='')
{

    (new \Illuminate\Database\Eloquent\Collection([[1, 2, 3], [1, 2, 3]]))->downloadExcel(
        '',
        $writerType = 'xls',
        $headings = false
    );

    //\Excel::download(\App\Models\Item::all(), 'invoices.xlsx');

    //$file_name .= '.' . $ext;
//    if (!$save) {
//        \Excel::create($file_name, function ($excel) use ($items, $sheet) {
//
//            $excel->sheet($sheet, function ($sheet) use ($items) {
//
//                $sheet->setOrientation('landscape');
//                $sheet->fromArray($items);
//
//            });
//
//        })->export($ext);
//    } else {
//
//        \Excel::create($file_name, function ($excel) use ($items) {
//
//            $excel->sheet('sheets', function ($sheet) use ($items) {
//
//                $sheet->setOrientation('landscape');
//                $sheet->fromArray($items);
//
//            });
//
//        })->store($ext);
//    }

}


function settings($key)
{
    //Cache::flush();
    if(!Cache::has('settings'))
    {
        $settings = Cache::remember('settings', 24*60, function() {
            return array_pluck(\App\Models\Settings::all()->toArray(), 'value','key');
        });
    }

    $settings = cache('settings');
    return isset($settings[$key]) ? $settings[$key] : NULL;
}


function settingsInD($option, $operator, $start)
{
    $settings = \App\Models\Settings::where('option', $option)->first();

    if (!$settings) {
        $settings = new \App\Models\Settings();
    }
    $settings->option = $option;

    if ($operator == 'add') {
        $settings->value  = $start + 1;
    } elseif ($operator == 'sub') {
        $settings->value  = $start - 1;
    }

    \Cache::forget('settings');
    $settings->save();
}


function post_dimensions($post, $type, $dim){
    $post_dimensions= [
        'post' => [
            'large'     => ['width' => 1078,    'height' => 551],
            'medium'    => ['width' => 682,     'height' => 294],
            'thumbnail' => ['width' => 100,     'height' => 51]
        ],
        'media' => [
            'large'     => ['width' => 1078,    'height' => 551],
            'medium'    => ['width' => 682,     'height' => 294],
            'thumbnail' => ['width' => 150,     'height' => 150]
        ],

    ];

    return isset($post_dimensions[$post][$type][$dim]) ? $post_dimensions[$post][$type][$dim] : $post_dimensions['post'][$type][$dim];
}

/**
 * Genesale_price a unique slug.
 * If it already exists, a number suffix will be appended.
 * It probably works only with MySQL.
 *
 * @link http://chrishayes.ca/blog/code/laravel-4-generating-unique-slugs-elegantly
 *
 * @param Illuminate\Database\Eloquent\Model $model
 * @param string $value
 * @return string
 */
function getUniqueSlug(\Illuminate\Database\Eloquent\Model $model, $value)
{
    $slug = \Illuminate\Support\Str::slug($value);
    $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

    return ($slugCount > 0) ? ( ($slugCount > 1) ? (($slugCount > 2) ? ( ($slugCount > 3) ? $slug.'-'.($slugCount+3) : $slug.'-'.($slugCount+2))  : $slug.'-'.$slugCount) ? : $slug.'-'.($slugCount+1) : $slug.'-'.$slugCount  ) : $slug;
}



function deleteImage($id){
    $image = Media::find($id);
    if ($image) {
        $sizes = ['full','large','medium','thumbnail'];
        foreach($sizes as $v){
            $images[]='public/uploads/'.$v.'/'.$image->guid;
        }
        File::delete($images);
        $image->delete();
        return true;
    }
    return false;

}


if (!function_exists('uploadFiles')) {
    function uploadFiles($files, $dir = 'images', $multi_dimensions = false)
    {
        $path  = base_path('public') . '/uploads/'; // . $dir

        if( ! \File::exists($path)) {
            $folder = \File::makeDirectory($path, 0777, true);
        }

        $files = is_array($files) ? $files : array($files);
        $file_count = count($files);
        $data = [];
        $uploadcount = 0;
        if($file_count > 0) {
            foreach ($files as $file) {
                $filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $mimeType  = $file->getMimeType();
                $original_file = $path . '/' . $filename;
                if( \File::exists($original_file)) {
                    $filename  = sha1($filename . time()) . '.' . $extension;
                }
                $filePath  = $path . '/' . $filename;
                $upload1   = $file->move($path, $filename);

                // if ($multi_dimensions) {
                //     $dimensions = \App\Models\Dimension::all();
                //     foreach ($dimensions as $dimension) {
                //         $p      = $path . '/' . $dimension->name . '_' . $filename;
                //         $upload = \Image::make($filePath)->resize($dimension->width, $dimension->height)->save($p);
                //     }
                // }
                if ($upload1) {
                    $data[] = [ 'success' => true, 'name' => $filename, 'mime_type' => $mimeType] ;
                    $uploadcount++;
                }
            }
        }
        if($uploadcount == $file_count){
            return $data;
        }
        return [];
    }
}

function random_strings($length_of_string)
{
    $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, $length_of_string);
}

function convertYoutubeFrame($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}

function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}

function getEmbedUrl($url) {
    if (strpos($url, 'youtube.com') > 0 || strpos($url, 'youtu.be') > 0) {
        return getYoutubeEmbedUrl($url);
    }elseif(strpos($url, 'vimeo.com') > 0 ){

    }
    return $url;
}

function generateVideoEmbedUrl($url){
    //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
    $finalUrl = '';
    if(strpos($url, 'facebook.com/') !== false) {
        //it is FB video
        $finalUrl.='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
    }else if(strpos($url, 'vimeo.com/') !== false) {
        //it is Vimeo video
        $videoId = explode("vimeo.com/",$url)[1];
        if(strpos($videoId, '&') !== false){
            $videoId = explode("&",$videoId)[0];
        }
        $finalUrl.='https://player.vimeo.com/video/'.$videoId;
    }else if(strpos($url, 'youtube.com/') !== false) {
        //it is Youtube video
        $videoId = explode("v=",$url)[1];
        if(strpos($videoId, '&') !== false){
            $videoId = explode("&",$videoId)[0];
        }
        $finalUrl.='https://www.youtube.com/embed/'.$videoId;
    }else if(strpos($url, 'youtu.be/') !== false){
        //it is Youtube video
        $videoId = explode("youtu.be/",$url)[1];
        if(strpos($videoId, '&') !== false){
            $videoId = explode("&",$videoId)[0];
        }
        $finalUrl.='https://www.youtube.com/embed/'.$videoId;
    }else{
        //Enter valid video URL
    }
    return $finalUrl;
}
if(!function_exists('ext_icon')) {

    function ext_icon($ext) {

        $icons = [
            'txt' => 'text-o',
            'htm' => 'text-o',
            'html' => 'text-o',
            'php' => 'code-o',
            'css' => 'code-o',
            'js' => 'code-o',
            'json' => 'code-o',
            'xml' => 'code-o',

            // images
            'png' => 'image-o',
            'jpe' => 'image-o',
            'jpeg' => 'image-o',
            'jpg' => 'image-o',
            'gif' => 'image-o',
            'bmp' => 'image-o',
            'ico' => 'image-o',
            'tiff' => 'image-o',
            'tif' => 'image-o',
            'svg' => 'image-o',
            'svgz' => 'image-o',

            // archives
            'zip' => 'zip-o',
            'rar' => 'zip-o',
            'exe' => 'zip-o',
            'msi' => 'zip-o',
            'cab' => 'zip-o',

            // audio/video
            'mp3' => 'audio-o',
            'qt' => 'video-o',
            'mov' => 'video-o',
            'swf' => 'video-o',
            'flv' => 'video-o',
            // adobe
            'pdf' => 'pdf-o',

            // ms office
            'doc' => 'word-o',
            'rtf' => 'application/rtf',
            'xls' => 'excel-o',
            'csv' => 'excel-o',
            'ppt' => 'powadminoint-o',

        ];

        return isset($icons[$ext]) ? $icons[$ext] : 'o';

    }

}


/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}


