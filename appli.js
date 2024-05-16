function getFormattedInvoiceDetails() {
    const invoiceItems = [];
    const rows = document.querySelectorAll("#bill-table tbody tr"); // Select bill table rows

    rows.forEach((row) => {
        const cells = row.querySelectorAll("td");
        if (cells.length >= 3) {
            const productName = cells[0].textContent.trim(); // Get product name
            const quantityText = cells[1].textContent.trim(); // Get unit text
            const priceText = cells[2].textContent.trim(); // Get price text

            const quantityMatch = quantityText.match(/(\d+(\.\d+)?)/); // Match quantity as a number
            const priceMatch = priceText.match(/(\d+(\.\d+)?)/); // Match price as a number

            if (productName && quantityMatch && priceMatch) {
                const quantity = parseFloat(quantityMatch[0]);
                const price = parseFloat(priceMatch[0]);
                invoiceItems.push({
                    productName,
                    unit: quantity,
                    price,
                    
                });
            }
        }
    });

    // Calculate the total amount
    const totalAmount = invoiceItems.reduce((total, item) => total + item.price, 0);

    // Create the formatted invoice details
    const formattedDetails = {
        items: invoiceItems,
        total: totalAmount, // Include the total amount
    };

    return formattedDetails;
}
//console.log("App.js loaded successfully.");
