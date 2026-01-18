<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <style>
            #map { width: 640px; height: 480px; }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <script language="javascript">

            var freq_431_432 = 
            {
                freq: "431-432 MHz",
                desc: "The use of the following frequencies is not permitted within 100km of London (Charing Cross).",
            };
            var freq_280_297 = 
            {
                freq: "28.0-29.7 MHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SK 985640",
            };
            var freq_144_146 = 
            {
                freq: "144-146 MHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR TA 012869",
            };
            var freq_1298_1299 = 
            {
                freq: "1298-1299 MHz",
                desc: "Use of an Unattended Beacon is not permitted in Northern Ireland and not within 50 km of NGR SS 206127 and NGR SE 202577.",
            };
            var freq_2310_23104125 = 
            {
                freq: "2310.0-2310.4125 MHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SS 206127 and NGR SE 202577.",
            };
            var freq_2392_2450 = 
            {
                freq: "2392-2450 MHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SS 206127 and NGR SE 202577.",
            };
            var freq_5670_5680 = 
            {
                freq: "5670-5680 MHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SS 206127 and NGR SE 202577.",
            };
            var freq_100_10125 = 
            {
                freq: "10.0-10.125 GHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SO 916223, SS 206127, NGR SK 985640 and NGR SE202577.",
            };
            var freq_240_24050 = 
            {
                freq: "24.0-24.050 GHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SK 985640 and NGR SE 202577.",
            };
            var freq_470_472 = 
            {
                freq: "47.0-47.2 GHz",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SK 985640 and NGR SE 202577.",
            };
            var freq_755 = 
            {
                freq: "Frequencies above 75.5 GHz that are listed in Schedule-1",
                desc: "Use of an Unattended Beacon is not permitted within 50 km of NGR SK 985640 and NGR SE 202577.",
            };

            var data = [
                {
                    label: "London (Charing Cross)",
                    data: [
                        freq_431_432,
                    ],
                    ngr: "TQ 29995 80379",
                    lat: 51.50740,
                    lng: -0.12829,
                    rad: 100000,
                },
                {
                    label: "RAF Waddington",
                    data: [
                        freq_280_297,
                        freq_100_10125,
                        freq_240_24050,
                        freq_470_472,
                        freq_755,
                    ],
                    ngr: "SK 98500 64000",
                    lat: 53.16402,
                    lng: -0.52813,
                    rad: 50000,
                },
                {
                    label: "GCHQ Scarborough",
                    data: [
                        freq_144_146,
                    ],
                    ngr: "TA 01200 86900",
                    lat: 54.26776,
                    lng: -0.44762,
                    rad: 50000,
                },
                {
                    label: "RAF Menwith Hill",
                    data: [
                        freq_1298_1299,
                        freq_2310_23104125,
                        freq_2392_2450,
                        freq_5670_5680,
                        freq_100_10125,
                        freq_240_24050,
                        freq_470_472,
                        freq_755,
                    ],
                    ngr: "SE 20250 57750",
                    lat: 54.01537,
                    lng: -1.69246,
                    rad: 50000,
                },
                {
                    label: "GCHQ Bude",
                    data: [
                        freq_1298_1299,
                        freq_2310_23104125,
                        freq_2392_2450,
                        freq_5670_5680,
                        freq_100_10125,
                    ],
                    ngr: "SS 20650 12750",
                    lat: 50.88633,
                    lng: -4.55119,
                    rad: 50000,
                },
                {
                    label: "GCHQ Cheltenham",
                    data: [
                        freq_100_10125,
                    ],
                    ngr: "SO 916 223",
                    lat: 51.89918,
                    lng: -2.12348,
                    rad: 50000,
                },
            ];

            var map = L.map('map').setView([54, -2.5], 6);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            data.forEach(function(val1, i, arr1) {
                console.log(val1);
                var circle = L.circle([val1.lat, val1.lng], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.3,
                    radius: val1.rad
                }).addTo(map);
                var popup = val1.label + "<br><table>"
                val1.data.forEach(function(val2, j, arr2) {
                    popup += "<tr><td>" + val2.freq + "</td><td>" + val2.desc +"</td></tr>";
                });
                popup += "</table>";
                circle.bindPopup(popup);
            });
        </script>
    </body>
</html>
