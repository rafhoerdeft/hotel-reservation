<?php

namespace App\Modules\Landing\Models;

class MenuModel
{
    public function getMenu()
    {
        if (session('logs') == user_log) {
            $data = [
                array(
                    "section"   => null,
                    "title"    => "Home",
                    "url"       => '#homes',
                    "index"     => 1,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Amenities",
                    "url"       => '#amenities',
                    "index"     => 2,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Rooms",
                    "url"       => '#rooms',
                    "index"     => 3,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Contact Us",
                    "url"       => '#call-us',
                    "index"     => 4,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "History",
                    "url"       => base_url('landing/histori'),
                    "index"     => 6,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Logout",
                    "url"       => base_url('landing/logout'),
                    "index"     => 7,
                    "icon"      => null,
                    "child"     => null,
                ),
            ];
        } else {
            $data = [
                array(
                    "section"   => null,
                    "title"    => "Home",
                    "url"       => '#homes',
                    "index"     => 1,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Amenities",
                    "url"       => '#amenities',
                    "index"     => 2,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Rooms",
                    "url"       => '#rooms',
                    "index"     => 3,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Contact Us",
                    "url"       => '#call-us',
                    "index"     => 4,
                    "icon"      => null,
                    "child"     => null,
                ),
                array(
                    "section"   => null,
                    "title"    => "Login",
                    "url"       => base_url('landing/login'),
                    "index"     => 5,
                    "icon"      => null,
                    "child"     => null,
                ),
            ];
        }

        return $data;
    }
}
