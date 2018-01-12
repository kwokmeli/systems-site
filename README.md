## Setup
Zip the contents of this folder into a compressed folder.

From the Wordpress dashboard, navigate to Media -> Library. Upload the following images from the img file into the Wordpress Media Library:
- agreement.png
- contract.png
- emergency.png
- help.png
- information.png
- layout.png
- meet.png
- qa.png
- staff.png

Next, navigate to Appearance -> Themes -> Add New -> Upload Theme, and upload the compressed folder. Activate the theme, then navigate to "Edit Page" for the homepage.
Add the standard homepage buttons with their respective text labels and images (see *Adding homepage buttons* below). Wrap ***all*** the buttons with the `<center></center>` and `<div class="home-wrapper"></div>` tags.

```html
<center>
  <div class="home-wrapper">

    [ HOMEPAGE BUTTON HTML ]

  </div>
</center>
```

### Adding homepage buttons
Upload your image for the button to the Media Library. Images should be 200 x 200 pixels and should be transparent for best results (white background is okay too).

To add the button to the front page, navigate to "Edit Page" for the homepage. Copy and paste the following into the text field:

```html
<a href="URL_HERE">
<div class="container">
<img src="IMAGE_URL_HERE"/>
<div class="overlay"><div class="text">BUTTON_LABEL_HERE</div></div>
</div>
</a>
```

You may notice that there is a div class "home-wrapper" that wraps around all the homepage buttons. This div is used to ensure that there are no more than 3 buttons per row. The div class "container" makes sure all the buttons stay centered when the browser window gets resized. The div class "overlay" is in charge of the text overlay (your button's label) that appears when a user hovers over the homepage button.

### Adding sub-menu buttons
To add a sub-menu button, navigate to "Edit Page" for the page you wish to add the sub-menu button to. Copy and paste the following into the text field:

```html
<div class="sub-menu-button"><div class="sub-menu-button-text">BUTTON_LABEL_HERE</div> <a href=""><span class="link-spanner"></span></a></div><br>
```

### Adding content to pages
- If you are adding text/regular content to a page, make sure to wrap the entire content with <h4></h4> tags.
- <h1>, <h2>, <h3>, <h5>, and <h6> should not be used when adding text/regular content to a page, as they are customized to be used for different parts of the site only (e.g. search result headers, sub-headers). ***Future edits of the layout will fix this issue so that different header styles can be used in regular text***
