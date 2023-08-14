<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;
use Config\Services;
use Psr\Log\LoggerInterface;


// ERROR
define('MESSAGE_ERROR', 'message_error');
define('ERROR_DELETE', 'data tidak bisa di hapus');
define('ERROR_INSERT', 'data tidak bisa di tambahkan');
define('INPUT_INVALID', 'input tidak valid');
define('DATA_EXIST', 'data sudah ada');
define('DATA_EMPTY', 'data tidak ditemukan');
define('ERROR_USER_NOT_FOUND', 'data user tidak ditemukan');

// SUCCESS
define('MESSAGE_SUCCESS', 'message_success');
define('SUCCESS_EDIT', 'data berhasil diedit');
define('SUCCESS_DELETE', 'data berhasil dihapus');

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
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['any', 'form', 'url'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected Session $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->session = Services::session();

        $this->request = $request;
    }

    public function data($data = NULL)
    {
        return [
            'auth' => $this->session->get(),
            'data' => $data,
            'flash' => $this->session->getFlashdata(),
            'query' => $this->request->getGet(),
        ];
    }

    public function isLogin()
    {
        return $this->session->get('is_login');
    }

    public function setBulkFlashData($data)
    {
        foreach ($data as $key => $value) {
            $this->session->setFlashData($key, $value);
        }
    }

    public function setBulkLoginSession($data)
    {
        foreach ($data as $key => $value) {
            if ($key != 'password') {
                $this->session->set($key, $value);
            }
        }

        $this->session->set('is_login', true);
    }
}
