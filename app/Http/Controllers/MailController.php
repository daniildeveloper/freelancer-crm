<?php

namespace App\Http\Controllers;

use App\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpImap\MailBox as ImapMailBox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;


class MailController extends Controller
{
  // protected $email_domain_name = 'mail.ru';
  // protected $email_smtp_port = 465;
  // protected $email_imap_port = 993;
  // protected $email_encrypt_connection_type = 'ssl';
  // protected $email_username = 'crm.clone@mail.ru';
  // protected $email_pwd = 'secretsecret';

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

  /**
   * create new email template
   * @param  Request $request laravel built in tempalate request
   * @return redirect           redirect to any route
   */
  public function createMailTemplate(Request $request)
  {
    $template              = new MailTemplate();
    $template->slug        = $request->slug;
    $template->body        = $request->body;
    $template->attachments = $request->attachments;
    $template->save();

    if ($request->new === 'new') {
      return redirect()->back([
        'message'      => 'Template ' . $$request->slug . ' created successfly',
        'message_type' => 'success',
      ]);
    }

    return redirect()->route('mail-new-template');
  }

  /**
   * get some template by slugname
   * @param  string $slug slug
   * @return object       slug with props
   */
  public function getTemplateBySlug($slug)
  {
    $slugObj = DB::table('mail_templates')->where('slug', $slug)->get()[0];
    return response()->json([
      'slug'        => $slugObj->slug,
      'body'        => $slugObj->body,
      'attachments' => $slugObj->attachments]);
  }

  /**
   * get list of all templates
   * @return json list of templates
   */
  public function getAllTemplates()
  {
    $templates = DB::table('mail_templates')->get();
    $res       = [];

    foreach ($templates as $template) {
      $t               = [];
      $t['slug']       = $template->slug;
      $t['body']       = $template->body;
      $t['attacments'] = $template->attachments;
      $res[]           = $t;
    }

    return response()->json($res);
  }

  /**
   * sync email with current client using imap
   * @return [type] [description]
   */
  public function imapSync() {
    $mailBox = ImapMailBox('{imap.' . $this->email_domain_name . ':' .$this->email_imap_port . '/imap/ssl}INBOX', $this->email_username, $this->email_pwd, __DIR__);

    $mailsIds = $mailbox->searchMailbox('ALL');
    if (!mailsIds) {
      die('INBOX is empty');
    }
    return $mailIds;
  }

  /**
   * Get single email
   * @param  [type] $number [description]
   * @return [type]         [description]
   */
  public function getEmailByNumber($number) {
    $mailBox = ImapMailBox('{imap.' . $this->email_domain_name . ':' .$this->email_imap_port . '/imap/ssl}INBOX', $this->email_username, $this->email_pwd, __DIR__);
    return $mailbox->getMail($this->imapSync[$number]);
  }


}
