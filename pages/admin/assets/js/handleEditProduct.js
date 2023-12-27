// thumbnail
const thumbnail = document.querySelector('#thumbnail');
const thumbnail_input = document.querySelector('#thumbnail_input');
thumbnail.addEventListener('click', () => thumbnail_input.click());
previewThumbnail(thumbnail_input, thumbnail);

// images
const images_button = document.querySelector('#images_button');
const images_input = document.querySelector('#images_input');
const imagesContainer = document.querySelector('#imagesContainer');
images_button.addEventListener('click', () => images_input.click());
images_input.onchange = evt => {
    const files = images_input.files;
    for (let i = 0; i < files.length; i++) {
        const url = URL.createObjectURL(files[i]);
        const html = `  <div class="w-1/3 rounded-md relative p-3 productImageWrap">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 absolute top-0 right-0 cursor-pointer text-red-700 removeBtn">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                            </svg>
                            <img aria-hidden="true" class="rounded-md object-cover w-full h-full dark:hidden productImage" src="${url}" alt="image" />
                        </div>`;
        imagesContainer.insertAdjacentHTML('beforeend', html);
        handleRemoveButton();
    }
};

// delete button

const productImagesArray = [];
getImageUrl();
console.log(productImagesArray);
handleRemoveButton();

function getImageUrl(){
    const productImages = document.querySelectorAll('.productImage');
    productImages.forEach(image => {
        const url = image.src;
        const _url = url.substring(url.indexOf('./upload'), url.length);
        productImagesArray.push(_url);
    });
}

function handleRemoveButton(){
    const productImageWraps = document.querySelectorAll('.productImageWrap');
    const removeBtns = document.querySelectorAll('.removeBtn');
    
    removeBtns.forEach((btn, index) => {
        btn.onclick = () => {
            productImagesArray.splice(index, 1);
            productImageWraps[index].remove();
            console.log(productImagesArray);
            handleRemoveButton();
        }
    });    
}

function previewThumbnail(input, img) {
    input.onchange = evt => {
        const [file] = input.files;
        img.src = URL.createObjectURL(file);
    }
}


// jquery
$(document).ready(function () {
    $("#submit").on("click", function (e) {
        e.preventDefault();
        sendData();
    });
});

function sendData() {
    const user_id = $("#user_id").val();
    const product_id = $("#product_id").val();
    const product_name = $("#product_name").val();
    const product_price = $("#product_price").val();
    const product_category = $("#product_category").val();
    const product_description = $("#product_description").val();
    let product_thunbnail = $("#thumbnail_input")[0].files[0];
    let product_images = $("#images_input").prop("files");

    const formData = new FormData();

    formData.append("user_id", user_id);
    formData.append("product_id", product_id);
    formData.append("product_name", product_name);
    formData.append("product_price", product_price);
    formData.append("product_category", product_category);
    formData.append("product_description", product_description);
    formData.append("product_images_array", JSON.stringify(productImagesArray));
    if (!thumbnail) {
        product_thunbnail = 'NULL'
    }
    formData.append("thumbnail", product_thunbnail);
    for (const image of product_images) {
        formData.append("images[]", image);
    }

    $.ajax({
        url: "pages/products/handleUpdate.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            alert(response);
        },
        error: function (error) {
            alert(error);
        }
    });
}