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

/**
 * Take all data from email form and send it to @param addresses
 * @param  string $subject    Theme of email. Must be default love, but not is.
 * @param  string $from_email Sender email
 * @param  string $from_name  Sender name
 * @param  array $addresses  It is array of addresses. Can have as items strings with emails and assocciative parts like 'name' => 'email'
 * @param  String $body       Email body
 * @param  string $alt_body   altrentaive email body with the same data as $body. Will be displayed when not is displayed normal email body.
 * @param  string $attach     path to some file like pdf or jpg attacjment
 * @return integer             If is success return 1.
 */
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
