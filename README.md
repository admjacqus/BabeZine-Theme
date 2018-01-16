# BabeZine Theme - Documentation
Content Hub for all Missguided content, from our biggest campaigns to our daily blog posts. 

WordPress Theme. Based on [BlankSlate](https://en-gb.wordpress.org/themes/blankslate/).

* ###### Design,###### Ben Perry.
* ###### Built & Maintained,###### Adam Jacques and Adam Collier.
* ###### PHP Guru,###### Phil Elson (Product Shortcode Cache).

* ######Curators,###### Sam Helligso and Skye Smith.
* ######SEO Lead,###### Heather Kipling.
* ######Author Lead,###### Imogen Ruddick.

## Getting Started
See [BabeZine](https://github.com/ishiiprints/BabeZine) for Local Dev Environment set-up.

No strict SASS / PHP rules yet, use default [Beautify](https://www.npmjs.com/package/beautify) settings.

## The Grid
Combing Masonry, Infinite scroll & ImagesLoaded.
Dependencies enqueued; functions.php (line 13).
Established; js/script.js (line 36).
Styled; sass/extra_shizz.scss (line 80).

### Masonry Grid
[Masonary by Desandro](https://masonry.desandro.com/)
[License](https://gumroad.com/purchases/mrTkgEdKf3ehoWubZCzNiA==/receipt)
[PDF](smb://mis-fp-001/departments/Creative/Blog/License/isotope-commercial-developer-license.pdf) - smb://mis-fp-001 > departments > Creative server > Blog > License

Masonry is a default script in WordPress and so can be enqueued as follows;

```<?php
function enqueue_masonry_script() {
    wp_enqueue_script('masonry');
}
add_action('wp_enqueue_scripts', 'enqueue_masonry_script');
```
[Reference](https://developer.wordpress.org/reference/functions/wp_enqueue_script/#default-scripts-included-and-registered-by-wordpress)

### Infinite Scroll
[Append items/pages to Masonry Grid](https://codepen.io/desandro/pen/eRRQVo)

### ImagesLoaded
[Images loaded](https://codepen.io/desandro/pen/RPKgEN)

### Version Control
script.js is enqueued with manual version control, when making updates to script.js you must increase the version number. 
[Reference; $ver](https://developer.wordpress.org/reference/functions/wp_enqueue_script/)


