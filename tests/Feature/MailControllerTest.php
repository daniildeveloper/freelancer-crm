<?php

namespace Tests\Feature;

use App\Http\Controllers\MailController;
use Tests\TestCase;

class MailControllerTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testExample()
  {
    $this->assertTrue(true);
  }

  public function testWriteEmail()
  {
    $mc = new MailController();
    $this->assertEquals(1, $mc->writeEmail(
      'First email from localhost',
      'crm.clone@mail.ru',
      'CRM clone',
      ['daniilborowkow@yandex.ru'],
      'This email is generated automaticly.'
    ));

  }


}
