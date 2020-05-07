# Minmap Plugin

> A plugin that provides minimap functionality.

## Instalation
Include Minimap script in your page `<head>`:
```
<script src='/Minimap/Minimap-web.js'></script>
```
You must also add the stylesheet:
```
<link href='./Minimap/Minimap.css' rel='stylesheet' />
```
## Usage
In this example we assume that you already have the Tomtom Maps SDK for Web library included.
```js

const ttMinimap = new tt.plugins.Minimap({
    mapRef: tt.map,
    zoomOffset: 5,
    ignorePitchAndBearing: true,
    mapOptions: {
        key: '<your-tomtom-maps-sdk-key>',
        style: 'tomtom://vector/1/basic-main',
        dragRotate: false
    }
});

const map = tt.map({
    key: '<your-tomtom-maps-sdk-key>',
    container: 'map',
    style: 'tomtom://vector/1/basic-main'
}, {
    center: [19.45773, 51.76217],
    zoom: 12
});

map.addControl(ttMinimap, 'bottom-right');
```
