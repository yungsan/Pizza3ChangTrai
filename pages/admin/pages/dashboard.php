<script src="./assets/js/charts-lines.js" defer></script>
<script src="./assets/js/charts-pie.js" defer></script>
<script src="./assets/js/charts-bars.js" defer></script>

<div class="grid gap-6 mb-8 md:grid-cols-2">
    <!-- Doughnut/Pie chart -->
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <canvas id="pie"></canvas>
        <h4 class="mb-4 text-center mt-4 font-semibold text-gray-800 dark:text-gray-300">
            Biểu đồ thống kê tổng sản phẩm
        </h4>
    </div>
    <!-- Bars chart -->
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Bars
        </h4>
        <canvas id="bars"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
            <!-- Chart legend -->
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                <span>Shoes</span>
            </div>
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                <span>Bags</span>
            </div>
        </div>
    </div>
    <!-- Lines chart -->
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Lines
        </h4>
        <canvas id="line"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
            <!-- Chart legend -->
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                <span>Organic</span>
            </div>
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                <span>Paid</span>
            </div>
        </div>
    </div>
</div>