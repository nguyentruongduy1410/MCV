

    <div class="content">
        <h1>Thống Kê Tổng Quan</h1>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stats-card">
                <h2>Doanh Số Bán Hàng</h2>
                <p>₫ 20,000,000</p>
            </div>
            <div class="stats-card">
                <h2>Đơn Hàng Mới</h2>
                <p>150</p>
            </div>
            <div class="stats-card">
                <h2>Sản Phẩm Bán Chạy</h2>
                <p>50</p>
            </div>
        </div>

        <!-- Sales Chart -->
        <div class="chart-container">
            <h2>Biểu Đồ Doanh Số</h2>
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const salesData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Doanh Số',
            data: [1000, 1500, 1200, 1800, 2000, 1700],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Get the canvas element and draw the sales chart
    const salesChartCanvas = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: salesData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
