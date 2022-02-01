<?php

use Symfony\Component\Mime\Email;

$email = (new Email())
	->from('contacts@verifpermis.com') 
	->to('abdoulayekante863@gmail.com') 
	//->cc('exemple@mail.com') 
	//->bcc('exemple@mail.com')
	//->replyTo('test42@gmail.com')
    	->priority(Email::PRIORITY_HIGH) 
    	->subject('Test')
	;