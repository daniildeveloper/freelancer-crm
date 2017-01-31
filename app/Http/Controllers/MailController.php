<?php

namespace App\Http\Controllers;

class MailController extends Controller
{

  /**
   * This function return view with index of mail client
   * @return view
   */
  public function showIndex()
  {
    return view('mail.index');
  }

  public function writeEmail($subject, $from_email, $from_name, $addresses, $body, $alt_body = '', $attach = '')
  {
    //mail ru creds: maile: crm.clone@mail.ru pwd: secretsecret
    // IPORTANT: mail ru is stupid fucking server. It want work only with ssl
    $transport = \Swift_SmtpTransport::newInstance('smtp.mail.ru', 465, 'ssl')
      ->setUsername('crm.clone@mail.ru')
      ->setPassword('secretsecret');
      
    $mailer = \Swift_Mailer::newInstance($transport);

    // $mailer = new \Swift_Mailer();
    $message = \Swift_Message::newInstance();

    // charset to utf8
    $message->setCharset('iso-8859-2');

    //give the msessage subject
    $message->setSubject($subject);

    //set from address with an assoc array
    $message->setFrom([$from_email => $from_name]);

    // set addressat
    $message->setTo($addresses);

    //give it a body
    $message->setBody($body);

    if ($alt_body !== '') {
      // alternative text
      $message->addPart($alt_body);
    }

    if ($attach !== '') {
      // file attachments
      $message->attach(\Swift_Attachment::fromPath($attach));
    }

    // send the message
    $result = $mailer->send($message);

    return $result;
  }
}
