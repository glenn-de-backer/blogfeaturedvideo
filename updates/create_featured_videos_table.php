<?php namespace Simplicitylab\BlogFeaturedVideo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateFeaturedVideosTable extends Migration
{

    public function up()
    {
        Schema::create('simplicitylab_blogfeaturedvideo_featured_videos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('post_id')->unsigned()->nullable()->index();
            $table->text('iframe_content')->nullable();
            $table->boolean('hasVideo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('simplicitylab_blogfeaturedvideo_featured_videos');
    }

}
