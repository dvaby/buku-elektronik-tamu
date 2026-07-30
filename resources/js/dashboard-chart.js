import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", () => {

    const warnaUtama = '#eab308';
    const warnaTransparan = 'rgba(234, 179, 8, 0.15)';
    const warnaBar = ['#eab308', '#374151', '#22c55e', '#f97316', '#3b82f6', '#ef4444', '#a855f7'];

    // ---------- GRAFIK PER BULAN ----------
    const ctxBulan = document.getElementById('chartBulan');
    let chartBulan;

    const muatChartBulan = async () => {
        const tahun = document.getElementById('filterTahunBulan').value;
        const res = await fetch(`${window.dashboardUrls.chartBulan}?tahun=${tahun}`);
        const json = await res.json();

        if (chartBulan) chartBulan.destroy();
        chartBulan = new Chart(ctxBulan, {
            type: 'line',
            data: {
                labels: json.labels,
                datasets: [{
                    label: 'Pengunjung',
                    data: json.data,
                    borderColor: warnaUtama,
                    backgroundColor: warnaTransparan,
                    fill: true,
                    tension: 0.3,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });
    };

    // ---------- GRAFIK PER TANGGAL ----------
    const ctxTanggal = document.getElementById('chartTanggal');
    let chartTanggal;

    const muatChartTanggal = async () => {
        const tahun = document.getElementById('filterTahunTanggal').value;
        const bulan = document.getElementById('filterBulanTanggal').value;
        const res = await fetch(`${window.dashboardUrls.chartTanggal}?tahun=${tahun}&bulan=${bulan}`);
        const json = await res.json();

        if (chartTanggal) chartTanggal.destroy();
        chartTanggal = new Chart(ctxTanggal, {
            type: 'line',
            data: {
                labels: json.labels,
                datasets: [{
                    label: 'Pengunjung',
                    data: json.data,
                    borderColor: '#16a34a',
                    backgroundColor: 'rgba(22, 163, 74, 0.1)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });
    };

    // ---------- GRAFIK PER KEPERLUAN ----------
    const ctxKeperluan = document.getElementById('chartKeperluan');
    let chartKeperluan;

    const muatChartKeperluan = async () => {
        const tahun = document.getElementById('filterTahunKeperluan').value;
        const bulan = document.getElementById('filterBulanKeperluan').value;
        const res = await fetch(`${window.dashboardUrls.chartKeperluan}?tahun=${tahun}&bulan=${bulan}`);
        const json = await res.json();

        if (chartKeperluan) chartKeperluan.destroy();
        chartKeperluan = new Chart(ctxKeperluan, {
            type: 'bar',
            data: {
                labels: json.labels,
                datasets: [{
                    label: 'Jumlah',
                    data: json.data,
                    backgroundColor: warnaBar,
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { x: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });
    };

    // Muat semua grafik pertama kali
    if (ctxBulan) muatChartBulan();
    if (ctxTanggal) muatChartTanggal();
    if (ctxKeperluan) muatChartKeperluan();

    // Event listener saat filter diganti
    document.getElementById('filterTahunBulan')?.addEventListener('change', muatChartBulan);
    document.getElementById('filterTahunTanggal')?.addEventListener('change', muatChartTanggal);
    document.getElementById('filterBulanTanggal')?.addEventListener('change', muatChartTanggal);
    document.getElementById('filterTahunKeperluan')?.addEventListener('change', muatChartKeperluan);
    document.getElementById('filterBulanKeperluan')?.addEventListener('change', muatChartKeperluan);

});