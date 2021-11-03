<?php

namespace App\Modules\Landing\Models;

class MenuModel
{
    public function getMenu()
    {
        $data = [
            array(
                "section"   => null,
                "title"    => "Beranda",
                "url"       => base_url('landing/home'),
                "index"     => 1,
                "icon"      => null,
                "child"     => null,
            ),
            array(
                "section"   => null,
                "title"    => "Profil",
                "url"       => 'javascript:void(0)',
                "index"     => 2,
                "icon"      => null,
                "child"     => array(
                    array(
                        "title"    => "Tentang Kami",
                        "url"       => base_url('landing/about'),
                        "index"     => 2.1,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Tugas Pokok & Fungsi",
                        "url"       => base_url('landing/tugaspokok'),
                        "index"     => 2.2,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Struktur Organisasi",
                        "url"       => base_url('landing/organisasi'),
                        "index"     => 2.3,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Regulasi Kelitbangan",
                        "url"       => base_url('landing/regulasi'),
                        "index"     => 2.4,
                        "icon"      => null,
                        "child"     => null,
                    ),
                ),
            ),
            array(
                "section"   => null,
                "title"    => "Publikasi",
                "url"       => 'javascript:void(0)',
                "index"     => 3,
                "icon"      => null,
                "child"     => array(
                    array(
                        "title"    => "SOP Kelitbangan",
                        "url"       => base_url('landing/sop'),
                        "index"     => 3.1,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Agenda Kegiatan",
                        "url"       => base_url('landing/agenda'),
                        "index"     => 3.2,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Informasi Publik",
                        "url"       => base_url('landing/info'),
                        "index"     => 3.3,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    // array(
                    //     "title"    => "Rencana Kerja",
                    //     "url"       => base_url('landing/rencanakerja'),
                    //     "index"     => 3.3,
                    //     "icon"      => null,
                    //     "child"     => null,
                    // ),
                    array(
                        "title"    => "Berita/Artikel",
                        "url"       => base_url('landing/berita'),
                        "index"     => 3.4,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Dokumentasi Kegiatan",
                        "url"       => base_url('landing/galeri'),
                        "index"     => 3.5,
                        "icon"      => null,
                        "child"     => null,
                    ),
                ),
            ),
            array(
                "section"   => null,
                "title"    => "Litbang",
                "url"       => 'javascript:void(0)',
                "index"     => 4,
                "icon"      => null,
                "child"     => array(
                    array(
                        "title"    => "Hasil Penelitian",
                        "url"       => base_url('landing/hasilpenelitian'),
                        "index"     => 4.1,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Hasil Inovasi",
                        "url"       => base_url('landing/hasilinovasi'),
                        "index"     => 4.2,
                        "icon"      => null,
                        "child"     => null,
                    ),
                ),
            ),
            array(
                "section"   => null,
                "title"    => "Forum Kelitbangan",
                "url"       => 'javascript:void(0)',
                "index"     => 5,
                "icon"      => null,
                "child"     => array(
                    array(
                        "title"    => "Usulan Penelitian",
                        "url"       => base_url('landing/usulanpenelitian'),
                        "index"     => 5.1,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Usulan Inovasi Daerah",
                        "url"       => base_url('landing/usulaninovasi'),
                        "index"     => 5.2,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Hasil Kelitbangan Perangkat Daerah",
                        "url"       => base_url('landing/hasilkpd'),
                        "index"     => 5.3,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Hasil Kelitbangan Stakeholder",
                        "url"       => base_url('landing/hasilksh'),
                        "index"     => 5.4,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Kerjasama Penelitian",
                        "url"       => base_url('landing/kerjasama'),
                        "index"     => 5.5,
                        "icon"      => null,
                        "child"     => null,
                    ),
                ),
            ),
            array(
                "section"   => null,
                "title"    => "Layanan",
                "url"       => 'javascript:void(0)',
                "index"     => 6,
                "icon"      => null,
                "child"     => array(
                    array(
                        "title"    => "Izin Penelitian",
                        "url"       => base_url('landing/izinpenelitian'),
                        "index"     => 6.1,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Izin Pengabdian Masyarakat",
                        "url"       => base_url('landing/izinpengabdian'),
                        "index"     => 6.2,
                        "icon"      => null,
                        "child"     => null,
                    ),
                    array(
                        "title"    => "Klinik Penelitian",
                        "url"       => base_url('landing/klinik'),
                        "index"     => 6.3,
                        "icon"      => null,
                        "child"     => null,
                    ),
                ),
            ),
            // array(
            //     "section"   => null,
            //     "title"    => "Klinik Penelitian",
            //     "url"       => base_url('landing/klinik'),
            //     "index"     => 7,
            //     "icon"      => null,
            //     "child"     => null,
            // ),
        ];

        return $data;
    }
}
