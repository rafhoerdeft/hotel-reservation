<?php

namespace App\Modules\Landing\Controllers;

use App\Models\MasterData;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
// -------------------------------------------
use App\Modules\Landing\Models\MenuModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;
	protected $session;
	protected $MasterData;
	protected $db;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['csrftoken', 'encrypt', 'alert', 'tanggal', 'view', 'ipadd', 'segment', 'form', 'checkimage', 'thumbnail', 'uang', 'photoexplode', 'midtrans', 'text'];

	protected $v_data = array();

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();

		$this->session = \Config\Services::session();
		$this->MasterData = new MasterData();
		$this->db = \Config\Database::connect();

		if (session('logs') == admin_log) {
			$this->session->destroy();
		}

		//ambil list menu pada model MenuModel
		$m_nav = new MenuModel;
		$this->v_data['menu'] = $m_nav->getMenu();
	}
}
