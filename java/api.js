async function convertCurrency(amount, fromCurrency, toCurrency) {
    const response = await fetch(`https://v6.exchangerate-api.com/v6/b4ec447add76d8b53cebda06/latest/${fromCurrency}`);
    const data = await response.json();
    const rate = data.conversion_rates[toCurrency];
    return (amount * rate).toFixed(2);
}

document.addEventListener("DOMContentLoaded", async () => {
    const priceUSD = 100; // Example price

    // Convert USD to CAD, USD to EUR, and CAD to EUR
    const priceUSDCAD = await convertCurrency(priceUSD, 'USD', 'CAD');
    const priceUSDEUR = await convertCurrency(priceUSD, 'USD', 'EUR');
    const priceCADEUR = await convertCurrency(priceUSD, 'CAD', 'EUR');
    const priceUSDGBP = await convertCurrency(priceUSD, 'USD', 'GBP');

    // Display the results
    document.getElementById("price-display").innerHTML = 
        `$${priceUSD} USD = $${priceUSDCAD} CAD <br>
        $${priceUSD} USD = €${priceUSDEUR} EUR <br>
        $${priceUSD} CAD = €${priceCADEUR} EUR <br>
        $${priceUSD} USD = $${priceUSDGBP} GBP`;
});
