const getDataOrder = async () => {
	let res = await fetch(`http://localhost:3000/order`)
	return res.json()
}

const addRowUser = async () => {

	const dataOrder = await getDataOrder();
	let orders = dataOrder.order
	let data = "";
	let no = 1;
	var num = new Intl.NumberFormat("en-US", {
		style: "currency",
		currency: "IDR"
	})

	orders.forEach((order) => {
		var a = new Date(order.date_order * 1000);
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		var date = a.getDate();
		var year = a.getFullYear();
		var month = months[a.getMonth()];
		var fullDate = date + '-' + month + '-' + year;
		data += `<tr>
    <td>${no++}</td>
    <td>${order.name}</td>
    <td>${num.format(order.total_price)}</td>
    <td>${fullDate}</td>
    </tr>`;
	})
	let table = document.getElementById('userTable')
	table.innerHTML = data
}
