<?php namespace Simplicitylab\BlogFeaturedVideo\Models;

use Model;

/**
 * FeaturedVideo Model
 */
class FeaturedVideo extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'simplicitylab_blogfeaturedvideo_featured_videos';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'post' => ['\RainLab\Blog\Models\Post']
    ];

    /**
     * Automatically creates a featured video for a post if not one already
     *
     * @param null $post
     */
    public static function getFromPost($post = null)
    {
        if(!$post->featuredvideo){
            $featuredVideo = new static;
            $featuredVideo->save();

            $post->featuredvideo = $featuredVideo;
        }

        return $post->featuredvideo;
    }

    /**
     * Before save event
     */
    public function beforeSave()
    {
        // if there is iframe content
        if(strlen($this->iframe_content)> 0){
            // set has video flag to true
            $this->hasVideo = true;
        }else{
            // otherwise set to false
            $this->hasVideo = false;
        }
    }


}