// GET ALL DATA
const getDataUser = async (id) => {
	let res = await fetch(`http://localhost:3000/user/role/${id}`)
	return res.json()
}

const addRowUser = async (id) => {

	const dataUser = await getDataUser(id);
	let users = dataUser.user
	let data = "";
	let no = 1;
	users.forEach((user) => {
		data += `<tr>
    <td>${no++}</td>
    <td>${user.name}</td>
    <td>${user.email}</td>
    <td>${user.address}</td>
    <td><img class="img-thumbnail rounded" width="200" src="http://localhost:8012/karcisku/assets/img/user/${user.image}"></td>
    <td>
    <button data-toggle="modal" data-id="${user.id}" data-target="#mediumModal" class="btn btn-primary btn-sm editUser">Edit </button>
         | 
        <button type="button" data-id="${user.id}" class="btn btn-danger btn-sm delUser">Delete</button>
        </td>
    </tr>`;
	})
	let table = document.getElementById('userTable')
	table.innerHTML = data
}

// DELETE DATA
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
						fetch(`http://localhost:3000/user/${id}`, {
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

// INSERT DATA
const insert = () => {
	$('.userAdd').on('click', function () {
		$('.modal-title').html('Add User Data')
		$('#payment-button').html('ADD DATA')
		$('#name').val('');
		$('#email').val('');
		$('#address').val('');
		$('#city').val('');
		$('#province').val('');

		const addUser = document.getElementById('addUser');
		const url = 'http://localhost:3000/user';

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
			url: `http://localhost:3000/user/${id}`,
			method: 'get',
			dataType: 'json',
			success: function (data) {
				user = data.user[0];
				$('#name').val(user.name);
				$('#email').val(user.email);
				$('#password').val(user.password);
				$('#password').prop('disabled', true);
				$('#image').prop('disabled', true);
				$('#address').val(user.address);
				$('#city').val(user.city);
				$('#province').val(user.province);
			}
		})

		const addUser = document.getElementById('addUser');
		const url = `http://localhost:3000/user/${id}`;


		addUser.addEventListener('submit', function (e) {
			e.preventDefault();

			const formData = new FormData(this);
			fetchPost(url, formData);

			alertNotif('Update');
		});
	})
}
// UPDATE DATA END

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
