<div>
    <div x-data="chart" class="mt-10 h-60 md:h-72">
        <div class="h-full">
            <canvas x-ref="chartCanva" wire:ignore></canvas>
        </div>
    </div>



    @assets
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endassets
    @script
        <script>
            let chart = null
            Alpine.data('chart', () => ({
                init() {
                    chart = this.initChart()
                    this.$wire.$watch('data', () => {
                        this.updateChart()
                    })
                },


                updateChart() {
                    chart.data.labels = this.$wire.labels
                    chart.data.datasets[0].data = this.$wire.data
                    chart.update();
                },

                initChart() {

                    return new Chart(this.$refs.chartCanva, {
                        type: 'line',
                        data: {
                            labels: this.$wire.labels,
                            datasets: [{
                                label: 'Orders',
                                fill: true,
                                hover: true,
                                data: this.$wire.data,
                                backgroundColor: [
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    ticks: {
                                        display: false
                                    }
                                    // display: false
                                },
                                y: {
                                    ticks: {
                                        display: false
                                    },
                                    beginAtZero: true

                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                tooltip: {
                                    enabled: true
                                },
                                legend: {
                                    display: false,
                                },
                            }
                        }
                    });
                }

            }))
        </script>
    @endscript
</div>
