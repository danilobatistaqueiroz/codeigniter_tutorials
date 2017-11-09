<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        //$this->cache->delete('foo');
        if ( ! $foo = $this->cache->get('foo'))
        {
            //echo 'Saving to the cache!<br />';
            $foo = 'oia cache legal!';
            // Save into the cache for 30 seconds
            $this->cache->save('foo', $foo, 30);
        }
        $data['title'] = $foo;
		$this->load->view('welcome_message', $data);
	}
}
