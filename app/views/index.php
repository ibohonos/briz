<h1 class="title">Phonebook</h1>

<div class="index">
	<div class="clearfix mb-2">
		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
			Create person
		</button>
	</div>
	<?php if (!empty($books)) : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Phone</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody id="persons_res">
				<?php foreach ($books as $book) : ?>
					<tr id="col_id_<?php echo $book['id']; ?>">
						<th scope="row"><?php echo $book['id']; ?></th>
						<td class="name"><?php echo $book['name']; ?></td>
						<td class="phone"><?php echo $book['phone']; ?></td>
						<td class="text-right">
							<a href="#" class="pr-2" data-toggle="modal" data-target="#update" data-id-persone="<?php echo $book['id']; ?>" data-name="<?php echo $book['name']; ?>" data-phone="<?php echo $book['phone']; ?>">Edit</a>
							<a href="#" class="text-danger" onclick="deletePersone(<?php echo $book['id']; ?>); return false;">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<div class="card text-center" id="empty_persons">
			<div class="card-body">
				<span>Phonebook is empty.</span>
			</div>
		</div>
	<?php endif; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createTitle">Create contact</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form onsubmit="createPerson(this); return false;" method="post">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateTitle">Update contact</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form onsubmit="updatePerson(this); return false;" method="post">
					<div class="form-group">
						<label for="edit_name">Name</label>
						<input type="text" class="form-control" id="edit_name" name="name" placeholder="Enter name" required>
					</div>
					<div class="form-group">
						<label for="edit_phone">Phone</label>
						<input type="text" class="form-control" id="edit_phone" name="phone" placeholder="Enter phone number" required>
					</div>
					<input type="hidden" name="id_persone" id="id_persone" value="">
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>