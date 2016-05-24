<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function indexAction()
    {

    }

    public function registerAction()
    {
        $user = new Users();

        // Store and check for errors
        $success = $user->save($this->request->getPost(), array('name', 'email'));

        $response = "Thanks for registering!";
        if (!$success) {
            $response = "Sorry, the following problems were generated: ";
            foreach ($user->getMessages() as $message) {
                $response .= "<br/>" . $message->getMessage();
            }
        }

        echo $response;

        $this->view->disable();
    }
}
