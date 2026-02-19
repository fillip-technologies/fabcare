<div class="grid grid-cols-1 lg:grid-cols-2 gap-20 mb-32 max-w-7xl mx-auto px-6">

    
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">
            Ladies Dry Cleaning
        </h2>
        <div class="h-1 w-16 bg-primary mb-10"></div>

        <div id="ladiesContainer" class="space-y-8 text-md"></div>
    </div>


    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">
            Gentlemen Dry Cleaning
        </h2>
        <div class="h-1 w-16 bg-primary mb-10"></div>

        <div id="gentlemenContainer" class="space-y-8 text-sm"></div>
    </div>

</div>

<!-- Hidden Template -->
<div id="dryTemplate" class="hidden">
    <div class="flex justify-between dry-row">
        <span class="item-name"></span>
        <span class="item-price font-semibold text-primary"></span>
    </div>
</div>

<script>
    // Ladies JSON
  const ladiesItems = [
    { name: "Coat", price: 400 },
    { name: "Dressings (Gown / Dress)", price: "350 / 450" },
    { name: "Saree (Plain / Embroidery / Silk)", price: "200 / 250 / 300" },
    { name: "Saree (Ornamental / Heavy Ornamental)", price: "400 / 500" },
    { name: "Blouse (Woolen)", price: 80 },
    { name: "Blouse (Plain / Ornamental)", price: "60 / 100" },
    { name: "Wedding Dress (Light / Medium / Heavy)", price: "500 / 1000" },
    { name: "Jacket (Light / Medium / Heavy)", price: "250 / 350 / 450" },
    { name: "Sweater / Cardigan", price: "300 / 400" },
    { name: "Slacks (Salwar / Plazo)", price: 100 },
    { name: "Shirt / Top", price: 100 },
    { name: "Kameez (Light / Heavy)", price: "120 / 150" },
    { name: "Salwar Kameez 2 pcs (Light / Heavy)", price: "200 / 250" },
    { name: "Salwar Kameez Dupatta 3pcs (Light / Heavy)", price: "250 / 300" },
    { name: "Shawl Stole / Scarf", price: "200 / 250" },
    { name: "Ghagra (Plain / Ornamental)", price: "150 / 200" },
    { name: "Jump Suit", price: 300 },
    { name: "Dupatta (Plain / Ornamental)", price: 100 },
    { name: "Trousers", price: 99 },
    { name: "Salwar Kameez Dupatta (3pcs) Polish", price: "60 / 120" },
    { name: "Nighty", price: 99 },
    { name: "Petticoat", price: 50 },
    { name: "Purse (Normal / Light / Heavy)", price: 50 },
    { name: "Skirt", price: 99 },
    { name: "Saree Polish (Light / Heavy)", price: "100 / 120" },
    { name: "Salwar Kameez Dupatta (Woolen)", price: 350 },
    { name: "Salwar Kameez (Woolen)", price: 200 }
];


    // Gentlemen JSON
  const gentlemenItems = [
    { name: "Suit (3 Piece)", price: 449 },
    { name: "Suit (2 Piece)", price: 350 },
    { name: "Waist Coat", price: 300 },
    { name: "Safari Suit", price: 400 },
    { name: "Coat / Blazer", price: 300 },
    { name: "Trousers", price: 80 },
    { name: "Over Coat", price: 400 },
    { name: "Sweater (Light / Heavy)", price: "300 / 400" },
    { name: "Tie", price: 49 },
    { name: "Shirt / Pant", price: 100 },
    { name: "Kurta Pyjama (Cotton / Silk)", price: "150 / 200" },
    { name: "Sherwani (3 Pcs) Light / Heavy", price: "500 / 800" },
    { name: "Churidar / Pyjama", price: 85 },
    { name: "Long Kurta / Jacket", price: 200 },
    { name: "Vest (Woolen)", price: 80 },
    { name: "Kurta (Cotton / Silk)", price: "120 / 180" },
    { name: "Pathani Suit", price: 300 },
    { name: "Jacket (Light / Heavy / Leather)", price: "300 / 400 / 500" },
    { name: "Socks", price: 20 },
    { name: "Handkerchief", price: 20 },
    { name: "Gloves", price: 40 },
    { name: "Starch Item (Per Pcs)", price: 50 },
    { name: "Underwear / Vest", price: 20 },
    { name: "Muffler", price: 50 },
    { name: "Caps / Hat", price: 50 },
    { name: "Dhoti Lungi", price: 199 },
    { name: "Track Suit", price: 75 },
    { name: "Half Trouser", price: 75 },
    { name: "Kurta (Woolen)", price: 199 },
    { name: "Shirt (Woolen)", price: 125 }
];


    document.addEventListener("DOMContentLoaded", function () {

        const template = document.querySelector("#dryTemplate .dry-row");

        function renderItems(items, containerId) {
            const container = document.getElementById(containerId);

            items.forEach(item => {
                const clone = template.cloneNode(true);

                clone.querySelector(".item-name").textContent = item.name;

                if (typeof item.price === "number") {
                    clone.querySelector(".item-price").textContent = "₹" + item.price;
                } else {
                    clone.querySelector(".item-price").textContent = "₹" + item.price;
                }

                container.appendChild(clone);
            });
        }

        renderItems(ladiesItems, "ladiesContainer");
        renderItems(gentlemenItems, "gentlemenContainer");

    });
</script>
