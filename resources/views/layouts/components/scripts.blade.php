    <!--! icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--!javascript file  -->
    <script type="module" src="{{ asset('templates/assets/index.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoryBtn = document.getElementById("mobileCategoryBtn");
            const categoryDropdown = document.createElement("div");

            categoryDropdown.id = "mobileCategoryDropdown";
            categoryDropdown.classList.add(
                "fixed", "bottom-20", "left-1/2", "-translate-x-1/2",
                "w-11/12", "max-w-md", "bg-white", "shadow-lg", "rounded-lg",
                "p-4", "opacity-0", "pointer-events-none", "transition-all", "duration-300",
                "max-h-80", "overflow-y-auto"
            );

            categoryDropdown.innerHTML = `
        <div class="flex justify-between items-center border-b pb-2">
            <h3 class="font-bold text-gray-700 text-lg">Pilih Kategori</h3>
            <button id="closeCategoryDropdown" class="text-gray-500 hover:text-gray-800 text-xl">
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>
        <div class="grid grid-cols-3 gap-3 mt-4">
            <div class="category-item flex flex-col items-center cursor-pointer hover:scale-105 transition">
                <div class="w-14 h-14 bg-green-100 flex items-center justify-center rounded-full shadow-md">
                    <ion-icon name="restaurant-outline" class="text-green-700 text-2xl"></ion-icon>
                </div>
                <span class="text-sm text-gray-700 mt-2">Makanan</span>
            </div>
            <div class="category-item flex flex-col items-center cursor-pointer hover:scale-105 transition">
                <div class="w-14 h-14 bg-blue-100 flex items-center justify-center rounded-full shadow-md">
                    <ion-icon name="cafe-outline" class="text-blue-700 text-2xl"></ion-icon>
                </div>
                <span class="text-sm text-gray-700 mt-2">Minuman</span>
            </div>
            <div class="category-item flex flex-col items-center cursor-pointer hover:scale-105 transition">
                <div class="w-14 h-14 bg-yellow-100 flex items-center justify-center rounded-full shadow-md">
                    <ion-icon name="gift-outline" class="text-yellow-700 text-2xl"></ion-icon>
                </div>
                <span class="text-sm text-gray-700 mt-2">Oleh-oleh</span>
            </div>
            <div class="category-item flex flex-col items-center cursor-pointer hover:scale-105 transition">
                <div class="w-14 h-14 bg-purple-100 flex items-center justify-center rounded-full shadow-md">
                    <ion-icon name="shirt-outline" class="text-purple-700 text-2xl"></ion-icon>
                </div>
                <span class="text-sm text-gray-700 mt-2">Batik</span>
            </div>
            <div class="category-item flex flex-col items-center cursor-pointer hover:scale-105 transition">
                <div class="w-14 h-14 bg-red-100 flex items-center justify-center rounded-full shadow-md">
                    <ion-icon name="briefcase-outline" class="text-red-700 text-2xl"></ion-icon>
                </div>
                <span class="text-sm text-gray-700 mt-2">Pakaian</span>
            </div>
            <div class="category-item flex flex-col items-center cursor-pointer hover:scale-105 transition">
                <div class="w-14 h-14 bg-teal-100 flex items-center justify-center rounded-full shadow-md">
                    <ion-icon name="color-palette-outline" class="text-teal-700 text-2xl"></ion-icon>
                </div>
                <span class="text-sm text-gray-700 mt-2">Kerajinan</span>
            </div>
        </div>
    `;

            document.body.appendChild(categoryDropdown);

            categoryBtn.addEventListener("click", function() {
                categoryDropdown.classList.toggle("opacity-0");
                categoryDropdown.classList.toggle("pointer-events-none");
            });

            document.getElementById("closeCategoryDropdown").addEventListener("click", function() {
                categoryDropdown.classList.add("opacity-0", "pointer-events-none");
            });

            document.addEventListener("click", function(event) {
                if (!categoryBtn.contains(event.target) && !categoryDropdown.contains(event.target)) {
                    categoryDropdown.classList.add("opacity-0", "pointer-events-none");
                }
            });
        });
    </script>
