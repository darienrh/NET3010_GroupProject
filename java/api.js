async function convertToCAD(priceUSD) {
    const response = await fetch("https://v6.exchangerate-api.com/v6/b4ec447add76d8b53cebda06/latest/USD");
    const data = await response.json();
    const rate = data.conversion_rates.CAD;
    return (priceUSD * rate).toFixed(2);
}

document.addEventListener("DOMContentLoaded", async () => {
    const priceUSD = 100; // Example price
    const priceCAD = await convertToCAD(priceUSD);

    document.getElementById("price-display").innerHTML = 
        `$${priceUSD} USD / $${priceCAD} CAD`;
});
