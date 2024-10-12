<div id="alert-box" class="border-2 border-green-500 flex items-center justify-between gap-4 px-4 py-2 text-green-600">
    {{ $slot }}

    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
        class="fill-green-600 cursor-pointer" id="alert-box-close-btn">
        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
    </svg>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alertBox = document.getElementById('alert-box')
        const button = document.getElementById('alert-box-close-btn')

        setTimeout(function() {
            closeAlert();
        }, 5000);

        button.addEventListener('click', function() {
            closeAlert();
        })

        function closeAlert() {
            alertBox.classList.add('hidden');
        }
    })
</script>
