# BlogFeaturedVideo

An OctoberCMS plugin that extends the rainlab.blog with the possibility of selecting a featured video

## Setting a featured video 

* Edit your article
* Go to the manage tab
* Fill in your vimeo/youtube iframe content in the Featured Video textarea
* Save

## Usage

```
{% if post.featuredvideo.hasVideo %}
    <div class="video-wrapper">{{ post.featuredvideo.iframe_content|raw }}</div>
{% endif %}
```

## License

* LGPL v2.1