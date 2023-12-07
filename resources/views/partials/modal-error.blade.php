@if (session()->has('error'))
    <div class="py-[18px] px-6 font-normal text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-white">
        <div class="flex items-center space-x-3 rtl:space-x-reverse">
            <iconify-icon class="text-2xl flex-0 text-danger-500" icon="system-uicons:target"></iconify-icon>
            <p class="flex-1 text-danger-500 font-Inter">
                {{ session('error') }}
            </p>
            <div class="flex-0 text-xl cursor-pointer text-danger-500" onclick="closeErrorMessage(this)">
                <iconify-icon icon="line-md:close"></iconify-icon>
            </div>
        </div>
    </div>

    <script>
        function closeErrorMessage(element) {
            // Temukan parent div yang berisi pesan error
            const errorMessageDiv = element.closest('.bg-danger-500');

            // Sembunyikan pesan error
            errorMessageDiv.style.display = 'none';
        }
    </script>
@endif
