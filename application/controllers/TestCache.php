<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCache extends CI_Controller {

	public function testApc()
	{
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        //$this->cache->delete('foo');
        if ( ! $msg = $this->cache->get('msgTitle'))
        {
            //echo 'Saving to the cache!<br />'; //if uncommented will appear in the page!!!!
            $msg = 'all right!! yes it works!'; 
            // Save into the cache for 30 seconds
            $this->cache->save('msgTitle', $msg, 30);
        }
        $data['title'] = $msg;
		$this->load->view('page_cache', $data);
	}
  
    public function testRedis(){
      $this->load->driver('cache');
      if(! $msg = $this->cache->redis->get('titleRedis')){
        $msg = "redis working!!!";
        $this->cache->redis->save('titleRedis', $msg, 20);
      }
      $data['title'] = $msg;
      $this->load->view('page_cache', $data);
    }
}
