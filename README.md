# mcmmo-minecraft-image-cache
This is a small script I created to cache Minecraft body images since the current image grabber doesn't work for McMMO Webstats.


# Install
+ Upload the scipts to the root of McMMO Webstats folder
+ Run setup.sql in the same database as McMMO
+ Edit config.php
  + add anywhere: $cache_time= 7; // number of days to keep cache before updating...
  + add anywhere: $cache_dir = "cache/users/"; // requires a trailing slash!
+ Edit player.php
  + Line 70: Edit src to image.php?username=$player