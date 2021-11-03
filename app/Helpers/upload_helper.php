<?php
if (!function_exists('upload_files')) {
    function upload_files($file, $path = '', $name = null)
    {
        if ($path == '') {
            $upload_path  = FCPATH . 'uploads';
        } else {
            $upload_path = $path;
        }
        if ($name != null) {
            $add_name = $name . '_';
        } else {
            $add_name = '';
        }
        $file_name  = 'file_' . $add_name . round(microtime(true) * 1000) . '.' . $file->getClientExtension();
        // $file_name = $file->getRandomName();

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move($upload_path, $file_name);

            $name_file = $file->getName();
            $res = array(
                'respons'   => true,
                'data'      => $name_file,
                'path'      => $upload_path,
                'ext'       => $file->getClientExtension(),
            );
        } else {
            $res = array(
                'respons' => false,
                'data'    => $file->getErrorString()
            );
        }

        return $res;
    }
}

if (!function_exists('upload_photo')) {
    function upload_photo($file, $path = '', $width = 800, $height = 750, $name = null, $thumb = TRUE, $width_thumb = 500, $height_thumb = 400)
    {
        $imgLib = \Config\Services::image();

        $upload = upload_files($file, $path, $name);
        if ($upload['respons']) {
            $file_name = $upload['data'];
            if ($thumb) {
                $new_name = str_replace("." . $upload['ext'], '_thumb' . '.' . $upload['ext'], $file_name);

                $imgLib->withFile($upload['path'] . '/' . $file_name)
                    ->fit($width_thumb, $height_thumb, 'center')
                    ->save($upload['path'] . '/' . $new_name);
            }
            $new_name = $file_name;
            $imgLib->withFile($upload['path'] . '/' . $file_name)
                ->resize($width, $height, true, 'width')
                ->save($upload['path'] . '/' . $new_name);

            $res = array(
                'respons' => true,
                'data'    => $file_name
            );
        } else {
            $res = array(
                'respons' => false,
                'data'    => $upload['data']
            );
        }
        return $res;
    }
}

if (!function_exists('upload_crop_photo')) {
    function upload_crop_photo($file, $path = '', $width = 250, $height = 250, $position = 'center', $name = null, $thumb = TRUE)
    {

        $imgLib = \Config\Services::image();

        $upload = upload_files($file, $path, $name);
        if ($upload['respons']) {
            $file_name = $upload['data'];
            if ($thumb) {
                $new_name = str_replace("." . $upload['ext'], '_thumb' . '.' . $upload['ext'], $file_name);
            } else {
                $new_name = $file_name;
            }
            $imgLib->withFile($upload['path'] . '/' . $file_name)
                ->fit($width, $height, $position)
                ->save($upload['path'] . '/' . $new_name);

            $res = array(
                'respons' => true,
                'data'    => $file_name
            );
        } else {
            $res = array(
                'respons' => false,
                'data'    => $upload['data']
            );
        }
        return $res;
    }
}

function get_extension($filename)
{
    $ext = explode('.', strtolower($filename));
    $ext = '.' . end($ext);
    return $ext;
}
