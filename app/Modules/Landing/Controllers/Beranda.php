<?php

namespace App\Modules\Landing\Controllers;

use App\Modules\Landing\Models\CarouselModel;
use App\Modules\Landing\Models\JenisKamarModel;

class Beranda extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        helper('text');
        $m_carousel = new CarouselModel();
        $m_jenis_kamar = new JenisKamarModel();

        $this->v_data['carousel']       = $m_carousel->getData(null, 3);
        $this->v_data['jenis_kamar']    = $m_jenis_kamar->getData();

        $this->v_data['active']     = '1';

        return views('content/beranda/content', 'Landing', $this->v_data);
    }
}
