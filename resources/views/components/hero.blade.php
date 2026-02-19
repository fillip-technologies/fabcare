<section
    class="relative w-full mx-auto 
                pl-0 md:pl-14 
                pt-28 md:pt-44 
                pb-16 md:pb-20 
                grid grid-cols-1 md:grid-cols-2 
                items-center overflow-hidden">

    <!-- LEFT CONTENT -->
    <div class="text-center md:text-left">
        <span class="inline-block mb-6 px-4 py-2 text-sm rounded-full bg-primary/10 text-primary font-medium">
            20% Discount for 1 Month Subscription
        </span>

        <h1
            class="text-4xl sm:text-5xl md:text-7xl 
                   leading-tight md:leading-[1.15] 
                   font-extrabold text-[#0A2A3A] 
                   mb-6 font-quicksand">
            Laundry today or<br class="hidden md:block" />
            Naked tomorrow.
        </h1>

        <p class="text-gray-600 w-full md:w-[90%] mx-auto md:mx-0 mb-8">
            Suds Laundry service will wash, dry, and fold your laundry at an affordable
            price. Pickup and drop off options available!
        </p>

        <button id="scrollToSteps"
            class="px-8 md:px-10 py-3 rounded-full font-semibold shadow-sm bg-primary text-white transition">
            How it works
        </button>

        <!-- STATS -->
        <div
            class="flex flex-col sm:flex-row 
                    justify-center md:justify-start 
                    gap-8 md:gap-16 
                    mt-12">
            <div>
                <p class="text-2xl md:text-3xl font-bold text-black">18m+</p>
                <p class="text-base md:text-lg text-primary font-extrabold">Happy Customers</p>
            </div>
            <div>
                <p class="text-2xl md:text-3xl font-bold text-black">10+</p>
                <p class="text-base md:text-lg text-primary font-extrabold">Years of Experience</p>
            </div>
        </div>
    </div>

    <!-- RIGHT CONTENT -->
    <div class="hidden md:flex relative justify-end items-center">

        <!-- BIG CIRCLE -->
        <div
            class="absolute 
                    w-[320px] h-[320px] 
                    md:w-[530px] md:h-[530px] 
                    bg-[#D0F6FF] rounded-full 
                    right-[-40px] md:right-[-60px] 
                    z-10">
        </div>

        <img src="assets/circle-two.png"
            class="absolute right-20 md:right-32 
                    -top-16 md:-top-28 
                    h-20 md:h-32 z-30" />

        <img src="assets/circle-four.png"
            class="absolute right-24 md:right-80 
                    -bottom-6 md:-bottom-10 
                    h-20 md:h-32 z-30" />

        <!-- WASHING MACHINE -->
        <img src="/assets/washingmachine.png"
            class="w-[260px] h-[260px] 
                    md:w-[400px] md:h-[400px] 
                    relative z-20" />

    </div>

</section>
<script>
document.getElementById("scrollToSteps").addEventListener("click", function () {
    const section = document.getElementById("steps");

    section.scrollIntoView({
        behavior: "smooth"
    });
});
</script>
