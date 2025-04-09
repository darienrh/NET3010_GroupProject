// fetchCurrencyRates.js
// Darien Ramirez-Hennessey
// Alexander Barnard
const apiKey = 'f1bf8cbc09d740fb30ac1abf748724b9';
const baseUrl = 'http://data.fixer.io/api/latest';

async function fetchCurrencyRates() {
    try {
        const response = await fetch(`${baseUrl}?access_key=${apiKey}`);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        if (data.success) {
            console.log('Currency Rates:', data.rates);
        } else {
            console.error('Error fetching data:', data.error);
        }
    } catch (error) {
        console.error('Fetch error:', error);
    }
}

fetchCurrencyRates();