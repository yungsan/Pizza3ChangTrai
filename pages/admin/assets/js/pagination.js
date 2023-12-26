const dataTable = document.querySelector('.dataTable');
const pagesContainer = document.querySelector('.pages_container')
const pageTitle = document.querySelector('.page_title').innerText;
const previousIcon = `<li class='previous_icon select-none	'>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>`;
const nextIcon = `<li class='next_icon select-none'>
                    <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Next">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </li>`;
const threeDotsIcon = ` <li class='three_dots_icon'>
                            <span class="px-3 py-1">...</span>
                        </li>`;

const activeClasses = 'px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple currentPage';
const normalClasses = 'px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple';

const page_html = (pageCount, isActive = false) => {
    return `<li class="pageCount select-none">
                <button class="${isActive ? activeClasses : normalClasses}">
                    ${pageCount}
                </button>
            </li>`
};

// 1 -> 6; 24 -> 4
// 1 -> 5; 24 -> 24/5 = 4
const MAX = 4;
const totalItem = Number(document.querySelector('.total_item').innerText);
const firstPage = 1;
let lastPage = parseInt(totalItem / MAX);
if (totalItem % MAX == 0) {
    lastPage--;
}

for (let i = firstPage; i <= lastPage; i++) {
    let page = page_html(i);
    if (i == firstPage) {
        page = page_html(i, true);
        pagesContainer.insertAdjacentHTML('beforeend', previousIcon);
    }
    pagesContainer.insertAdjacentHTML('beforeend', page);
    if (i == lastPage) {
        pagesContainer.innerHTML += nextIcon;
    }
}

const pageItems = document.querySelectorAll('.pageCount button');
pageItems.forEach(page => {
    page.addEventListener('click', (e) => {
        changeCurrentPage(page);
        sendData(Number(page.innerText), MAX, pageTitle);
    });
    pageItems[0].click();
});

document.querySelector('.next_icon').addEventListener('click', () => {
    const currentPage = Number(document.querySelector('.currentPage').innerText);
    if (currentPage == lastPage) {
        return;
    }
    pageItems[currentPage].click();
});

document.querySelector('.previous_icon').addEventListener('click', () => {
    const currentPage = Number(document.querySelector('.currentPage').innerText);
    if (currentPage == firstPage) {
        return;
    }
    pageItems[currentPage - 2].click();
});

function sendData(start, max, table) {
    $.ajax({
        url: 'php/handleDataByPage.php',
        method: 'POST',
        data: { start, max, table },
        success: function (response) {
            const data = JSON.parse(response);
            console.log(data);
            render(data);
        },
        error: function (error) {
            alert(error);
        }
    })
}

function render(data) {
    dataTable.innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        dataTable.innerHTML += createRowData(data[i]);
    }
}

function createRowData(data) {
    const html = `<tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        ${data.id}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="../profile/${data.avatar}"
                                    alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold">${data.fullname}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    ${data.email}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        ${data.username}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        ${data.sdt}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            ${data.joined}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        ${data.address}
                    </td>
                </tr>`;
    return html;
}

function changeCurrentPage(clickedPage) {
    const currentPage = document.querySelector('.currentPage');
    currentPage.className = normalClasses;
    clickedPage.className = activeClasses;
}