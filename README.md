# BlogFeaturedVideo

An OctoberCMS plugin that extends the rainlab.blog with the possibility of selecting a featured video

## Setting a featured video 

* Edit your article
* Go to the manage tab
* Fill in your vimeo/youtube iframe content in the Featured Video textarea
* Save

## Usage

Show featured videos
```
{% if post.featuredvideo.hasVideo %}
    <div class="video-wrapper">{{ post.featuredvideo.iframe_content|raw }}</div>
{% endif %}

```
Show featured video images

```
{% if post.featuredvideo.featuredimages.count %}
    {% for image in post.featuredvideo.featuredimages %}
        <a href="{{ image.path }}">image.file_name</a>
    {% endfor %}
{% endif %}
```

## License

* LGPL v2.1
