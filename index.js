const express = require('express');
const fs = require('fs');
const app = express();

const port = process.env.GEOCODER_PORT || 8082;

let places = JSON.parse(fs.readFileSync('places.json'));

app.get('/', (req, res) => {
	if (!req.query.s) {
		return res.status(400).send({
			error: true,
			data: 'Missing required parameters!',
		});
	}

	if (req.query.s.length < 3) {
		return res.status(400).send({
			error: true,
			data: 'Search needs to be of length 3 or larger!',
		});
	}

	const search = req.query.s.toLowerCase();
	const filtered_data = places.filter((obj) => obj[1].toLowerCase().startsWith(search) || obj[0].toLowerCase().startsWith(search));
	const data = filtered_data.map((obj) => { return { name: obj[0] + ', ' + obj[1] , lat: obj[2], lng: obj[3] } });

	res.send({
		error: false,
		data: data,
	});
});

app.listen(port, () => console.log(`Geocoder app listening on port ${port}!`))
