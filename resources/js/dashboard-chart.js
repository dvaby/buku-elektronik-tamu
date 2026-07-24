new Chart(ctx, {
    type: 'line',
    data: {
        labels: window.grafikTanggal,
        datasets: [{
            label: 'Jumlah Kunjungan',
            data: window.grafikJumlah,
            borderColor: '#eab308',
            backgroundColor: 'rgba(234, 179, 8, 0.1)',
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