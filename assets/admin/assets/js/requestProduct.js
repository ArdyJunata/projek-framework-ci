// INSERT DATA
const insert = () => {
	$('.userAdd').on('click', function () {
		$('.modal-title').html('Add Tour Data')
		$('#payment-button').html('ADD DATA')
		$('#name').val('');
		$('#price').val('');
		$('#description').val('');

		const addUser = document.getElementById('addUser');
		const url = 'http://localhost:3000/product';

		addUser.addEventListener('submit', function (e) {
			e.preventDefault();

			const formData = new FormData(this);
			fetchPost(url, formData);

			alertNotif('Add');
		});
	})
}
// INSERT DATA

// UPDATE DATA
const update = () => {
	$('.editUser').on('click', function () {
		$('.modal-title').html('Edit User Data');
		$('#payment-button').html('EDIT DATA');

		const id = $(this).data('id');

		$.ajax({
			url: `http://localhost:3000/product/${id}`,
			method: 'get',
			dataType: 'json',
			success: function (data) {
				product = data.product[0];
				$('#name').val(product.name);
				$('#price').val(product.price);
				$('#description').val(product.description);
				$('#image').prop('disabled', true);
			}
		})

		const addUser = document.getElementById('addUser');
		const url = `http://localhost:3000/product/${id}`;


		addUser.addEventListener('submit', function (e) {
			e.preventDefault();

			const formData = new FormData(this);
			fetchPost(url, formData);

			alertNotif('Update');
		});
	})
}
// UPDATE DATA END

const delt = () => {
	const tombol = document.querySelectorAll('.delUser')
	const num = 1;
	tombol.forEach(m =>
		m.addEventListener('click', (e) => {
			const id = e.target.dataset.id
			console.log('ok')
			swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this imaginary data!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						fetch(`http://localhost:3000/product/${id}`, {
								method: 'delete',
								headers: {
									'Content-Type': 'application/json'
								},
							}).then(res => res.json())
							.then(res => console.log(res))
						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						}).then((value) => {
							document.location.reload()
						})
					} else {
						swal("Your imaginary file is safe!");
					}
				});
		})
	);
}
// DELETE DATA END

// GET ALL DATA
const getDataUser = async (id) => {
	let res = await fetch(`http://localhost:3000/product/category/${id}`)
	return res.json()
}

const getDataProduct = async () => {
	let res = await fetch(`http://localhost:3000/product`)
	return res.json()
}

const getAllProduct = async () => {
	const dataProduct = await getDataProduct();
	let products = dataProduct.product;
	let data = "";
	let no = 1;
	var num = new Intl.NumberFormat("en-US", {
		style: "currency",
		currency: "IDR"
	})
	products.forEach((product) => {
		data += `<tr>
    <td>${no++}</td>
    <td>${product.name}</td>
    <td>${num.format(product.price)}</td>
    <td>${product.description}</td>
    <td><img class="img-thumbnail rounded" width="200" src="http://localhost:8012/karcisku/assets/img/product/category/${product.image}"></td>
    <td>
    <button data-toggle="modal" data-id="${product.id}" data-target="#mediumModal" class="btn btn-primary btn-sm editUser">Edit </button>
         | 
        <button type="button" data-id="${product.id}" class="btn btn-danger btn-sm delUser">Delete</button>
        </td>
    </tr>`;
	})
	let table = document.getElementById('userTable')
	table.innerHTML = data
}

const addRowUser = async (id) => {

	const dataProduct = await getDataUser(id);
	let products = dataProduct.data
	let data = "";
	let no = 1;
	var num = new Intl.NumberFormat("en-US", {
		style: "currency",
		currency: "IDR"
	})
	products.forEach((product) => {
		data += `<tr>
    <td>${no++}</td>
    <td>${product.name}</td>
    <td>${num.format(product.price)}</td>
    <td>${product.description}</td>
    <td><img class="img-thumbnail rounded" width="200" src="http://localhost:8012/karcisku/assets/img/product/category/${product.image}"></td>
    <td>
    <button data-toggle="modal" data-id="${product.id}" data-target="#mediumModal" class="btn btn-primary btn-sm editUser">Edit </button>
         | 
        <button type="button" data-id="${product.id}" class="btn btn-danger btn-sm delUser">Delete</button>
        </td>
    </tr>`;
	})
	let table = document.getElementById('userTable')
	table.innerHTML = data
}

const fetchPost = (url, formData) => {
	const data = {
		name: formData.get('name'),
		email: formData.get('email'),
		address: formData.get('address'),
		city: formData.get('city'),
		province: formData.get('province'),
		image: formData.get('image'),
		role_id: formData.get('role_id'),
	}

	const options = {
		method: 'post',
		body: formData,
		headers: {
			'Content-Type': 'application/json'
		},
		mode: 'no-cors'
	}

	fetch(url, options)
		.then(res => res.json())
		.then(res => console.log(res));
}
