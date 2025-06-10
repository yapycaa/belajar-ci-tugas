<?php

namespace app\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Filters\FilterInterface;

Class RedirectAfterLogin implements FilterInterface
{
    public function before(RequestInterface $request, $argument = null)
    {
        $session = session();

        if ($session->get('isLoggedIn') && !$session->get('hassRedirected')){
            $session->set('hasRedirected',true);
            return redirect()->to('/contact');
        }

    }
    public function after(RequestInterface $request, ResponseInterface $response, $argument = null)
    {
        
    }
}