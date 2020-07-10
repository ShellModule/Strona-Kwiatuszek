let map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM(),
            maxZoom: 17
        })
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([21.0250611, 52.1853313]),
        zoom: 16,
        maxZoom: 17
    })
});
let feature = new ol.Feature({
    geometry: new ol.geom.Point(ol.proj.fromLonLat([21.0250611, 52.1853313]))
})

let style = new ol.style.Style({
    image: new ol.style.Icon({
        anchor: [0.5, 46],
        anchorXUnits: 'fraction',
        anchorYUnits: 'pixels',
        scale: 0.5,
        src: "../imgs/contact/map-marker-alt-solid.svg"
    })
})

feature.setStyle(style)

let layer = new ol.layer.Vector({
    source: new ol.source.Vector({
        features: [
            feature
        ]
    })
});
map.addLayer(layer);