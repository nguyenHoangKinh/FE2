const btnGetProducts = document.querySelector('.get-products');
const loader = document.querySelector('.loader');
const detail = document.querySelector('.product_detail');
const str = document.querySelector('#search');
const boxSearch = document.querySelector('.boxSearch');
const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));
const productNameModel = document.querySelector('#exampleModal');
let lastState;
btnGetProducts.addEventListener('click', function () {
    getAllProducts();
})

async function getAllProducts() {
    //Show loader
    loader.style.display = 'block';
    // Bước 1: Gửi yêu cầu lên server
    const url = "getallproducts.php";
    const response = await fetch(url);

    // Bước 2: Xử lý kết quả trả về
    const result = await response.json();
    const table = document.querySelector('#table');
    for (let index = 0; index < result.length; index++) {
        table.innerHTML += `<div class="col-md-3"> 
                                <img onclick="getProductDetail(${result[index].id})" src="./public/images/${result[index].product_photo}" alt="" class="img-fluid">
                                <a href="product.php?id=${result[index].id}">
                                    <h4 >${result[index].product_name}</h4>
                                </a>
                                <p>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="likedId" value="${result[index].id}">
                                        <button type="submit" class="btn badge text-bg-danger">${result[index].pLike}</button>
                                    </form>
                                    ${result[index].product_price}
                                </p>
        </div>`
    }
    //Show loader
    loader.style.display = 'none';
}

getAllProducts();

async function getProductDetail($id) {
    //Buoc 1: Gui yeu cau
    const url = 'getproductbyid.php';
    const data = { productId: $id }
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(data)
    });

    //Xu ly ket qua
    const result = await response.json();
    modal.show();
    
    const modalBody = document.querySelector('.modal-body');

    modalBody.innerHTML = `<img src="./public/images/${result.product_photo}" alt="" class="img-fluid">
    <h1>${result.product_name}</h1>
    <p>${result.product_price}</p>
    <p>${result.product_description}</p>`;

    lastState = window.location.pathname;
    history.pushState({}, "", "product.php?id=" + result.id);
    
    //hien thi tren chi tiet san pham 
    // detail.innerHTML = `<img src="./public/images/${result.product_photo}" alt="" class="img-fluid">
    // <h1>${result.product_name}</h1>
    // <p>${result.product_price}</p>
    // <p>${result.product_description}</p>`;
}
const myModalLEL = document.querySelector("#exampleModal");
myModalLEL.addEventListener("hide.bs.modal", (event) => {
  history.pushState({}, "", lastState);
});
async function getSearch(str) {
    //B1: Gui yeu cau
    const url = 'getsearch.php';
    const data = {
        keyword: str.value
    };
    const reponse = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(data)
    });
    //B2: Xu ly ket qua
    const result = await reponse.json();
    boxSearch.innerHTML = "";
    for (let index = 0; index < result.length; index++) {
        boxSearch.innerHTML += `<div class="value_search"">
    <img src="./public/images/${result[index].product_photo}" alt="" class="img-fluid">
    ${result[index].product_name}
    </div>
    `
    }
    if (str.value == "") {
        boxSearch.innerHTML = "";
    }
}