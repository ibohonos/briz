function createPerson(f) {
	if (f.name.value != "" && f.phone.value != "") {

		$.post("/home/createPerson", {
			name: f.name.value,
			phone: f.phone.value
		}, function(req) {
			let res = req.result
			let emp = $("#empty_persons")

			if (emp) {
				emp.empty()

				let tabl = '<table class="table table-striped">\
								<thead>\
									<tr>\
										<th scope="col">#</th>\
										<th scope="col">Name</th>\
										<th scope="col">Phone</th>\
										<th scope="col">Actions</th>\
									</tr>\
								</thead>\
								<tbody id="persons_res"></tbody>\
							</table>'

				$(".index").append(tabl)
			}

			if (req.success) {
				let data

				data = "<tr id=\"col_id_" + res.id + "\">\
							<th scope=\"row\">" + res.id +  "</th>\
							<td class=\"name\">" + res.name +  "</td>\
							<td class=\"phone\">" + res.phone +  "</td>\
							<td class=\"text-right\">\
								<a href=\"#\" class=\"pr-2\" data-toggle=\"modal\" data-target=\"#update\" data-id-persone=\"" + res.id + "\" data-name=\"" + res.name + "\" data-phone=\"" + res.phone + "\">Edit</a>\
								<a href=\"#\" class=\"text-danger\" onclick=\"deletePersone(" + res.id + "); return false;\">Delete</a>\
							</td>\
						</tr>"
				$('#persons_res').append(data)
				$('#create').modal('hide')
			} else {
				alert(req.message)
			}
		}, "json");

	}
}

function updatePerson(f) {
	if (f.name.value != "" && f.phone.value != "") {

		$.post("/home/updatePerson", {
			id: f.id_persone.value,
			name: f.name.value,
			phone: f.phone.value
		}, function(req) {
			let res = req.result

			if (req.success) {
				$("#col_id_" + res.id + " .name").text(res.name)
				$("#col_id_" + res.id + " .phone").text(res.phone)
				$("#col_id_" + res.id + " .pr-2").attr('data-name', res.name)
				$("#col_id_" + res.id + " .pr-2").attr('data-phone', res.phone)
				$('#update').modal('hide')
			} else {
				alert(req.message)
			}
		}, "json");

	}
}

function deletePersone(id_persone) {
	$.post("/home/daletePerson", {
		id: id_persone
	}, function(req) {
		let res = req.result

		if (req.success) {
			$("#col_id_" + id_persone).empty()
		} else {
			alert(req.message)
		}
	}, "json");
}

$('#update').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget)
	let id = button.data('id-persone')
	let name = button.data('name')
	let phone = button.data('phone')
	let modal = $(this)

	modal.find('#id_persone').val(id)
	modal.find('#edit_name').val(name)
	modal.find('#edit_phone').val(phone)
})