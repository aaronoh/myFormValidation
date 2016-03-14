<?php
require_once 'loginhelper.php';
start_session();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="deleteConfirm.js"></script>
        <!-- Script for google maps api -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>

            function initialize() {

                var mapOptions = {
                    //Zoom level 
                    zoom: 14,
                    // The latitude and longitude to center the map 
                    center: new google.maps.LatLng(53.2803, -6.1529), // IADT

                    //styling
                    styles: [
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e9e9e9"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dedede"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#333333"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        }
                    ]
                };

                // Get the HTML DOM element that will contain the map 

                var mapElement = document.getElementById('map');

                // Draw the Google Map 
                var map = new google.maps.Map(mapElement, mapOptions);

                // marker
                var marker;
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(53.2803, -6.1529),
                    map: map,
                    title: 'IADT'
                });
                marker.addListener('click', toggleBounce);


                function toggleBounce() {
                    if (marker.getAnimation() !== null) {
                        marker.setAnimation(null);
                    } else {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                }
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <?php
        if (is_logged_in()) {
            require 'header.php';
        } else {
            require 'headernonav.php';
        }
        ?>
        <div id="map"></div>
        <div class="container">
            <div class="row">
                <h1 class="gsheader col-lg-2 col-lg-offset-5">Contact</h1>
            </div>

            <!--            <div class="row">
                            <div class="contactpanels col-lg-2">
                                <table>
                                    <tr>
            
                                        <td class="tbtitle"> Human Resources </td>
            
                                    </tr>
                                    <tr>
                                        <td class="bold"> Adam Doyle</td>
                                    </tr>
                                    <tr>
                                        <td> 01 230 1412</td>
                                    </tr>
                                    <tr>
                                        <td> adam.hr@pilot.ie</td>
                                    </tr>
                                </table>
            
                            </div>
                            <div class="contactpanels col-lg-2 col-lg-offset-1">
                                <table>
                                    <tr>
            
                                        <td class="tbtitle"> Human Resources </td>
            
                                    </tr>
                                    <tr>
                                        <td class="bold"> Adam Doyle</td>
                                    </tr>
                                    <tr>
                                        <td> 01 230 1412</td>
                                    </tr>
                                    <tr>
                                        <td> adam.hr@pilot.ie</td>
                                    </tr>
                                </table>
            
                            </div>      <div class="contactpanels col-lg-2 col-lg-offset-1">
                                <table>
                                    <tr>
            
                                        <td class="tbtitle"> Human Resources </td>
            
                                    </tr>
                                    <tr>
                                        <td class="bold"> Adam Doyle</td>
                                    </tr>
                                    <tr>
                                        <td> 01 230 1412</td>
                                    </tr>
                                    <tr>
                                        <td> adam.hr@pilot.ie</td>
                                    </tr>
                                </table>
            
                            </div>
                            <div class="contactpanels col-lg-2 col-lg-offset-1">
                                <table>
                                    <tr>
            
                                        <td class="tbtitle"> Human Resources </td>
            
                                    </tr>
                                    <tr>
                                        <td class="bold"> Adam Doyle</td>
                                    </tr>
                                    <tr>
                                        <td> 01 230 1412</td>
                                    </tr>
                                    <tr>
                                        <td> adam.hr@pilot.ie</td>
                                    </tr>
                                </table>
            
                            </div>
                        </div>-->
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>