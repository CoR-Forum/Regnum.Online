## After the Leaflet Update

I recently updated Leaflet to 1.9.4.

[mapkey icons](https://github.com/mapshakers/leaflet-mapkey-icon) are abandoned and need to be replaced.

# How to contribute

I stopped playing Regnum a few days after creating the initial version of this map, so a lot of community help is needed to keep it up.

For now, if you have no real idea about what you're doing, please only add new data entries. Don't try to add new Layer Groups or something. I will extend it a bit in the future, so you can edit the data sources in Excel or something like that.

If you have any ideas, feel free to open an issue on github so we can discuss. There's a lot of stuff that can be done with the project domain :)

This map is fully based on [Leaflet](https://github.com/Leaflet/Leaflet) and exists out of thausands of image tiles.
I know that there is some issue with loading images in certain zoom levels. I'll need to generate the image tiles with a little trick, but dunno how to do yet. It'll be fixed in the future for sure.

Map is served by [BunnyCDN](https://bunnycdn.com) with a small webserver for php-based spawntimes.

# Plugins

It is working with the following leaflet plugins:

[leaflet-rastercoords](https://github.com/commenthol/leaflet-rastercoords)
[Leaflet.awesome-markers](https://github.com/lvoogdt/Leaflet.awesome-markers)

To generate the map tiles, I'm using [gdal2tiles-leaflet](https://github.com/Joshua2504/gdal2tiles-leaflet). It's a bit tricky with regnums amazing coordination system.

At the moment, this is the correct script to generate the map tiles. Files can be found [here](https://drive.google.com/drive/folders/1ud_Rvriq_dqOXZfnn8cj41A2kbkirJox?usp=sharing).

```
#!/bin/bash

# do NOT forget to install `python-gdal` library
# assuming you are on a debian like OS
#sudo apt install python-gdal

# get the tool
test ! -f gdal2tiles.py \
  && curl https://raw.githubusercontent.com/joshua2504/gdal2tiles-leaflet/master/gdal2tiles.py \
  > gdal2tiles.py
# process ...
python ./gdal2tiles.py -l -p raster -z 1-5 -w none source.png /path/to/tiles

```

### Contributers

Thanks for contributing to the following players.

- Zeddi (Valhalla)
- Suo (Valhalla)
