<?php
class PopupController
{
function popup(){
		print d()->view('popup_callme_tpl');
}
function thanks(){
		print d()->view('popup_thanks_tpl');
}

function send_form () {
	if (d()->validate('popup_form')) {
		if (isset(d()->params['check']) && d()->params['check'] == '') {
			d()->form_title = 'Форма Заказать звонок';
			$emails = explode(",", d()->Option->email);
			foreach ($emails as $email) {
				$message = d()->popup_mail_f1_tpl();
				if (d()->Option->is_smtp){
					d()->mail->setFrom(array(d()->Option->smtp_address => d()->Option->smtp_name));
				} else {
					d()->mail->setFrom(array($_ENV['EMAIL_FROM_ADDRESS'] => $_ENV['EMAIL_FROM_NAME']));
				}
				d()->mail->setTo(trim($email));
				d()->mail->setSubject(d()->form_title . ' с ' . $_SERVER['HTTP_HOST']);
				d()->mail->setBody($message, 'text/html');
				if (d()->Option->is_smtp){
					if (d()->Option->is_smtp_ssl){
						$bb = new Swift_SmtpTransport(d()->Option->smtp_host, d()->Option->smtp_port, 'ssl');
						$transport = $bb->setUsername(d()->Option->smtp_login)->setPassword(d()->Option->smtp_password);
					} else {
						$bb = new Swift_SmtpTransport(d()->Option->smtp_host, d()->Option->smtp_port);
						$transport = $bb->setUsername(d()->Option->smtp_login)->setPassword(d()->Option->smtp_password) ;
					}
					d()->mail->setTransport($transport);
				}
				d()->mail->send();
			}
			
			$cont = d()->Clientcontact->new;
			$cont->phone = d()->params['phone'];
			$cont->name = d()->params['name'];
			$cont->form_name = d()->form_title;
			$cont->save;
			// print "$.fancybox.open({'href': '/ajax/thanks', 'type': 'ajax', helpers: { overlay: { locked: false }}});";
			// print 'document.location.href="/thankyou"';
			print "$('#form_callback_id').find('input').val(''); $('.popup-success').addClass('d-flex');$('.popup-form').addClass('d-none');$('#form_callback_id').trigger('reset');";
		}
		
		exit;
	}
	d()->reload();
}
}