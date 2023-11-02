@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        const chart = new Chart(
            document.getElementById('chart'), {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: @json($dataset)
                },
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            }
        );
        Livewire.on('updateChart', data => {
            chart.data = data;
            chart.update();
        });
    </script>
@endpush

{{-- <x-panel class="bg-white p-4 mx-4 mt-4"> --}}
    <div>
        <canvas id="chart"></canvas>
    </div>
{{-- </x-panel> --}}