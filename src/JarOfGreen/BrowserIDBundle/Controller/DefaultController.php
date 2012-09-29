<?php

namespace JarOfGreen\BrowserIDBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JarOfGreen\SampleAppBundle\Entity\User;


class DefaultController extends Controller
{
	
    public function loginAction(Request $request)
    {
		
		$assertion = $request->request->get('assertion');
		if ($assertion) {
			
			$audience = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
			$postdata = 'assertion=' . urlencode($assertion) . '&audience=' . urlencode($audience);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://verifier.login.persona.org/verify");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
			$json = curl_exec($ch);
			curl_close($ch);
			
			$json = json_decode($json);
			if (is_object($json) && isset($json->status) && $json->status == "okay") {
				
				$em = $this->getDoctrine()->getEntityManager();

				$dql = "SELECT u FROM JarOfGreenSampleAppBundle:User u  WHERE u.email = :email";
				$query = $em->createQuery($dql)
						->setParameter('email', $json->email);
				$users = $query->getResult();
				
				if (count($users) == 1) {
					$user = $users[0];
					print "EXISTING USER ".$user->getId();
				} else {
					$user = new User();
					$user->setEmail($json->email);
					$em->persist($user);
					$em->flush();
					print "EXISTING USER ".$user->getId();
				}
				
				die();
			}
			
		}
		
        return $this->render('JarOfGreenBrowserIDBundle:Default:login.html.twig', array());
    }

	public function logoutAction()
    {
        return $this->render('JarOfGreenBrowserIDBundle:Default:logout.html.twig', array());
    }

	
}
