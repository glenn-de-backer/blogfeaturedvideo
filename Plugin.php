<?php namespace Simplicitylab\BlogFeaturedVideo;

use Event;
use System\Classes\PluginBase;
use Rainlab\Blog\Controllers\Posts as PostsController;
use RainLab\Blog\Models\Post as PostModel;
use Simplicitylab\BlogFeaturedVideo\Models\FeaturedVideo;

/**
 * BlogFeaturedVideo Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * @var array   Require the RainLab.Blog plugin
     */
    public $require = ['RainLab.Blog'];


    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'BlogFeaturedVideo',
            'description' => 'No description provided yet...',
            'author'      => 'Simplicitylab',
            'icon'        => 'icon-leaf'
        ];
    }

    public function boot()
    {
        // extend post model
        PostModel::extend(function($model) {
            // add a hasone relationship with the featuredvideo model
            $model->hasOne['featuredvideo'] = ['Simplicitylab\BlogFeaturedVideo\Models\FeaturedVideo'];
        });

        // extend form fields
        PostsController::extendFormFields(function($widget, $model, $context) {

            if (!FeaturedVideo::getFromPost($model)) return;

            // add featured video textarea
            $widget->addFields([
                'featuredvideo[iframe_content]' => [
                    'label'   => 'simplicitylab.blogfeaturedvideo::lang.backend.featuredvideo',
                    'tab'     => 'rainlab.blog::lang.post.tab_manage',
                    'type'    => 'textarea',
                    'size'    => 'small',
                    'comment' => 'simplicitylab.blogfeaturedvideo::lang.backend.description'
                ]
            ], 'secondary');

        });
    }


}
