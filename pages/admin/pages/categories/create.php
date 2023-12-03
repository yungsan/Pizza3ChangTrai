<div class="flex flex-col overflow-y-auto md:flex-row mb-8">
    <div class="h-32 md:h-auto md:w-1/2 cursor-pointer hover:opacity-50" id="thumbnail">
        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden thumb" src="./assets/img/blank_img.jpg"
            alt="Office" />
        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="./assets/img/blank_img.jpg"
            alt="Office" />
        <input type="file" name="avatar" id="inputFile" hidden>
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Thêm chuyên mục
            </h1>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tên chuyên mục</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Xuc xích Đức" id="category_name" />
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                id="updateThumbnailButton">
                Thêm vào bảng
            </button>
        </div>
    </div>
</div>

<script>
    const fileInput = document.querySelector('#inputFile');
    document.querySelector('#thumbnail').addEventListener('click', () => {
        fileInput.click();
    })

    fileInput.onchange = evt => {
        const img = document.querySelector('#avatar');
        const [file] = fileInput.files
        document.querySelector('.thumb').src = URL.createObjectURL(file)
    }
    // jquery
    $(document).ready(function () {
        $("#updateThumbnailButton").on("click", function (e) {
            sendData();
        });
    });

    function sendData() {
        const category_name = $("#category_name").val();
        const thumbnail = $('#inputFile')[0].files[0];
        const formData = new FormData();
        formData.append("category_name", category_name);
        formData.append('thumbnail', thumbnail);

        $.ajax({
            url: "pages/categories/handleCreate.php",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
            },
            error: function (error) {
                alert(error);
            }
        });
    }
</script>