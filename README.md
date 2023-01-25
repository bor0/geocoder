Geocoder HTTP API
-----------------

Installation:

1. Run `npm install` to install the necessary packages
2. Run `php build-places.php` to populate the places
3. Run `npm run start`

Example:

```
$ curl http://localhost:8082/?s=skopj
{"error":false,"data":[{"name":"North Macedonia - Skopje","lat":"41.99646","lng":"21.43141"}]}
$ curl http://localhost:8082/?s=skopja
{"error":false,"data":[]}
```

Boro Sitnikovski, 2023
