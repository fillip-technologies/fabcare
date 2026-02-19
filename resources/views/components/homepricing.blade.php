<div class="mb-32 text-center">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">
        Home Furnishing
    </h2>

    <p class="text-gray-500 mb-16">
        Professional cleaning for your home essentials.
    </p>

    <div id="homeFurnishingContainer" class="grid grid-cols-1 md:grid-cols-3 gap-12"></div>
</div>

<div id="homeTemplate" class="hidden">
    <div class="home-item">
        <p class="item-name text-gray-500"></p>
        <p class="item-price text-sm font-bold text-primary mt-3"></p>
    </div>
</div>

<script>
    const homeFurnishingItems = [
    { name: "Bath Towel", price: 49 },
    { name: "Bed Sheet (Single / Double)", price: "60 / 99" },
    { name: "Blanket (Light / Medium / Heavy)", price: "300 / 500 / 600" },
    { name: "Quilt Cover", price: 150 },
    { name: "Soft Toy", price: 300 },
    { name: "Cushion Cover (Small / Large)", price: "50 / 99" },
    { name: "Pillow Cover (Small / Large)", price: "40 / 60" },
    { name: "Quilt (Single / Double)", price: "350 / 500" },
    { name: "Comforter (Single / Double)", price: "300 / 400" },
    { name: "Curtain Panel (2.5 × 6 ft)", price: "200 / 250" },
    { name: "Cushion (Small / Large)", price: "50 / 100" },
    { name: "Window Curtain", price: 75 }
];


    document.addEventListener("DOMContentLoaded", function () {

        const container = document.getElementById("homeFurnishingContainer");
        const template = document.querySelector("#homeTemplate .home-item");

        homeFurnishingItems.forEach(item => {

            const clone = template.cloneNode(true);

            clone.querySelector(".item-name").textContent = item.name;

            // Add ₹ only if price is number
            if (typeof item.price === "number") {
                clone.querySelector(".item-price").textContent = "₹" + item.price;
            } else {
                clone.querySelector(".item-price").textContent = "₹" + item.price;
            }

            container.appendChild(clone);
        });

    });
</script>
