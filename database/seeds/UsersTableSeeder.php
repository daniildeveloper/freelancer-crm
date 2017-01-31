<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $me           = new User();
    $me->name     = 'Daniil Borowkow';
    $me->email    = 'daniilborowkow@yadnex.ru';
    $me->password = bcrypt('secret');
    $me->save();
  }
}
