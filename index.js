const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector(
	'.container-cart-products'
);

btnCart.addEventListener('click', () => {
	containerCartProducts.classList.toggle('hidden-cart');
});

/* ========================= */
const cartInfo = document.querySelector('.cart-product');
const rowProduct = document.querySelector('.row-product');

// Lista de todos los contenedores de productos
const productsList = document.querySelector('.container-items');

// Variable de arreglos de Productos
let allProducts = [];

const valorTotal = document.querySelector('.total-pagar');

const countProducts = document.querySelector('#contador-productos');

const cartEmpty = document.querySelector('.cart-empty');
const cartTotal = document.querySelector('.cart-total');

productsList.addEventListener('click', e => {
	if (e.target.classList.contains('btn-add-cart')) {
		const product = e.target.parentElement;

		const infoProduct = {
			quantity: 1,
			title: product.querySelector('h2').textContent,
			price: product.querySelector('p').textContent,
			id: product.querySelector('id').textContent,
		};

		const exits = allProducts.some(
			product => product.title === infoProduct.title
		);

		if (exits) {
			const products = allProducts.map(product => {
				if (product.title === infoProduct.title) {
					product.quantity++;
					return product;
				} else {
					return product;
				}
			});
			allProducts = [...products];
		} else {
			allProducts = [...allProducts, infoProduct];
		}

		showHTML();
	}
});

rowProduct.addEventListener('click', e => {
	if (e.target.classList.contains('icon-close')) {
		const product = e.target.parentElement;
		const title = product.querySelector('p').textContent;

		allProducts = allProducts.filter(
			product => product.title !== title
		);

		console.log(allProducts);

		showHTML();
	}
});

// Funcion para mostrar  HTML
const showHTML = () => {
	if (!allProducts.length) {
		cartEmpty.classList.remove('hidden');
		rowProduct.classList.add('hidden');
		cartTotal.classList.add('hidden');
	} else {
		cartEmpty.classList.add('hidden');
		rowProduct.classList.remove('hidden');
		cartTotal.classList.remove('hidden');
	}

	// Limpiar HTML
	rowProduct.innerHTML = '';

	let total = 0;
	let totalOfProducts = 0;

	allProducts.forEach(product => {
		const containerProduct = document.createElement('div');
		containerProduct.classList.add('cart-product');

		containerProduct.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.title}</p>
                <span class="precio-producto-carrito">${product.price}</span>
            </div>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="icon-close"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>
        `;

		rowProduct.append(containerProduct);

		total =
			total + parseInt(product.quantity * product.price.slice(1));
		totalOfProducts = totalOfProducts + product.quantity;
	});

	valorTotal.innerText = `$${total}`;
	countProducts.innerText = totalOfProducts;
};
//CheckOut
var allPurchases = [];
//allPurchases[0]=1;
var allPurchasesquantity = [];
//allPurchasesquantity [0]=1;
var allPurchasesprices = [];
var allPurchasesSize=0;
function setAllPurchases(){
    
    allProducts.forEach(product => {
        
        allPurchases.push(product.id);
        allPurchasesquantity.push(product.quantity);
        allPurchasesprices.push(product.price);
        allPurchasesSize++;
        //alert("Guardando elemento...."+allPurchasesSize+": "+allPurchases[allPurchasesSize]+"-"+allPurchasesquantity[allPurchasesSize]);
    });
}

function checkout(){
    //Guardar el carrito y pasarlo a CheckOut.php
    setAllPurchases();
    
    //Ir a checkout
    if(allPurchasesSize>0){
        alert("Ingresa tus datos para continuar...");
        openForm();
    }else{
        alert("Carrito vacio");
    }
    
}
document.getElementById('myForm').addEventListener('submit',(e) =>{
    e.preventDefault();
    const userName = document.getElementById('userName').value;
    const userMail = document.getElementById('userMail').value;
    const userAdress = document.getElementById('userAdress').value;
    localStorage.setItem('Name',userName);
    localStorage.setItem('Mail',userMail);
    localStorage.setItem('Adress',userAdress);
    console.log(localStorage.getItem('Name'));
    console.log(localStorage.getItem('Mail'));
    console.log(localStorage.getItem('Adress'));
    setvalues();
    
    
});
function setvalues(){
    
    localStorage.setItem("Cart",JSON.stringify(allPurchases));
    localStorage.setItem("Cartq",JSON.stringify(allPurchasesquantity));
    localStorage.setItem("Price",JSON.stringify(allPurchasesprices));
    localStorage.setItem("Index",allPurchasesSize);
    let getObject = localStorage.getItem('Cart');
    console.log(JSON.parse(getObject));
    getObject = localStorage.getItem('Cartq');
    console.log(JSON.parse(getObject));
    getObject = localStorage.getItem('Price');
    console.log(JSON.parse(getObject));
    let index = localStorage.getItem('Index')
    console.log(index);
    alert("Terminando...");
    location.href="include/checkout.php";
}
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
