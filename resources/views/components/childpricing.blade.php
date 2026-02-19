<div class="mb-32 max-w-5xl mx-auto px-6"> 
    <div id="childrenPricing" class="space-y-8 text-lg"></div>
</div>

<div id="pricingTemplate" class="hidden">
    <div class="flex justify-between border-b border-gray-100 pb-2 pricing-row">
        <span class="item-name text-sm"></span>
        <span class="item-price font-semibold text-primary text-sm"></span>
    </div>
</div>

<script>
    const childrenItems = [
    { name: "Shirt / T-shirt", price: 60 },
    { name: "Shorts / Skirt / Frock", price: 60 },
    { name: "Trouser", price: 75 },
    { name: "Salwar Kameez", price: 120 },
    { name: "Jacket", price: 300 },
    { name: "Ghagra", price: 160 },
    { name: "Suit (2 Pcs)", price: 250 },
    { name: "Suit (3 Pcs)", price: 300 },
    { name: "Coat Blazer (Light)", price: 200 },
    { name: "Coat Blazer (Heavy)", price: 250 },
    { name: "Other Small Items", price: 55 },
    { name: "Sweater", price: 100 },
    { name: "Kurta Pyjama", price: 100 },
    { name: "Frock", price: "100 / 150" },
    { name: "Salwar Kameez Dupatta", price: 150 },
    { name: "Waist Coat Child", price: 250 }
];


    document.addEventListener("DOMContentLoaded", function () {

        const container = document.getElementById("childrenPricing");
        const template = document.querySelector("#pricingTemplate .pricing-row");

        childrenItems.forEach((item, index) => {

            const clone = template.cloneNode(true);

            clone.querySelector(".item-name").textContent = item.name;
            clone.querySelector(".item-price").textContent = "₹" + item.price;

            if (index === childrenItems.length - 1) {
                clone.classList.remove("border-b", "border-gray-100", "pb-4");
            }

            container.appendChild(clone);
        });

    });
</script>
