<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('header');
            $table->string('slug')->unique();
            $table->integer('money')->nullable();
            $table->integer('prepayment')->nullable();
            $table->dateTime('deadline');
            $table->text('notes');
            $table->string('attachment')->nullable();
            $table->integer('lead_id');
            $table->integer('status')->default(0); # 0 - сделка на уровне словесного договора без утвержденного тз или назначенных сроков исполнения. 1 - сделка утвержденна. Договор и/или предоплата. 2 - заказ выплнен, но на утверждении. 3 - заказ выполнен и утвержден. Довольный клиент.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
