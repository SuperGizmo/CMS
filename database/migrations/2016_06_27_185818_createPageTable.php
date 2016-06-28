<?php

use App\Models\Page;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table){
            $table->increments('id');
            $table->string('title')->notNull();
            $table->text('content');
            $table->string('url');
            $table->string('linkName');
            $table->softDeletes();
            $table->timestamps();
        });

        $page = new Page;
        $page->title = 'Home';
        $page->content = '<p>This is the default home page</p>';
        $page->url = 'home';
        $page->linkName = 'Home';
        $page->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
