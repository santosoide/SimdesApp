<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Akun\AkunRepository;
use SimdesApp\Repositories\Jenis\JenisRepository;
use SimdesApp\Repositories\Kelompok\KelompokRepository;
use SimdesApp\Repositories\Obyek\ObyekRepository;

class AjaxAkunController extends Controller
{
    /**
     * Get Akun list using by Ajax Dropdown
     *
     * @param AkunRepository $akun
     * @return mixed
     */
    public function getListAkun(AkunRepository $akun)
    {
        return $akun->getListAkun();
    }

    /**
     * Get Kelompok list using by Ajax Dropdown
     *
     * @param KelompokRepository
     * @param $kelompok
     * @param $akun_id
     *
     * @return mixed
     */
    public function getListKelompok(KelompokRepository $kelompok, $akun_id)
    {
        return $kelompok->getListKelompok($akun_id);
    }

    /**
     * Get Jenis list using by Ajax Dropdown
     *
     * @param JenisRepository
     * @param $jenis
     * @param $kelompok_id
     *
     * @return mixed
     */
    public function getListJenis(JenisRepository $jenis, $kelompok_id)
    {
        return $jenis->getListJenis($kelompok_id);
    }

    /**
     * Get Obyek list using by Ajax Dropdown Accessing by Backoffice
     *
     * @param ObyekRepository
     * @param $obyek
     * @param $jenis_id
     *
     * @return mixed
     */
    public function getListObyek(ObyekRepository $obyek, $jenis_id)
    {
        return $obyek->getListObyek($jenis_id);
    }

    /**
     * Get Obyek list using by Ajax Dropdown Accessing by Desa
     *
     * @param ObyekRepository
     * @param $obyek
     * @param $jenis_id
     *
     * @return mixed
     */
    public function getListObyekDesa(ObyekRepository $obyek, $jenis_id)
    {
        return $obyek->getListObyekDesa($jenis_id, $this->getOrganisasiId());
    }
}
