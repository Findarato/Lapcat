-- SUMMARY --

This module will show all your sets and pictures from your Flickr account.
There's no need to create extra content types of feeds. Just fill in your setttings and your gallery is done.

-- REQUIREMENTS --

You need to install the Lightbox2 and libraries module.

-- CONFIGURATION --

After installation you'll need to download phpFlickr.php from http://code.google.com/p/phpflickr/downloads/list
Place the file phpFlickr.php inside sites/all/libraries/phpFlickr

When visiting the configuration page on admin/settings/flickr you'll get notified if the file cannot be found at sites/all/libraries/phpFlickr/phpFlickr.php

Fill in your key's and user ID and you can visit your gallery at yoursite/flickr

You can find your key's on: http://www.flickr.com/services/apps/by/me
If you don't know your user ID, that can be found inside your Flickr RSS feed or at this page: http://idgettr.com/

-- PRIVATE PICTURES --
Go to http://www.flickr.com/services/api/keys/ and edit your API key details, set 'authentication type' to web application and 
as 'callback url': http://phpflickr.com/tools/auth/auth.php
Visit http://phpflickr.com/tools/auth/ and fill in your API and Secret keys to generate a token, copy the token in the field on the settings page.