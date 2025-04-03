import { restClient } from '@polygon.io/client-js';
const rest = restClient("lDVRlNirCsyOyqdAdVLlcGEwppAvy4ya");

rest.reference.tickers({
    market: "stocks",
    active: "true",
    order: "asc",
    limit: 100,
    sort: "ticker"
}).then((data) => {
	console.log(data);
}).catch(e => {
	console.error('An error happened:', e);
});