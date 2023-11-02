<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                <div class="grid grid-cols-8">
                    <div class="col-span-6">
                        <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                            Mi Progreso
                        </h2>
                    </div>
                    <div class="col-span-7">
                        @livewire('users.chart-exercise')
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
@once
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush
@endonce
