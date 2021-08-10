<?php include('inc/top.php') ?>
<h1 class="text-center mt-2">Users</h1>
<div class="container mt-5">
	<a href="<?= base_url('User/add') ?>"><button class="btn btn-primary float-right mb-3">Add New</button></a>
	<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Full Name</th>
				<th scope="col">Email</th>
				<th scope="col">Phone</th>
				<th scope="col">Address</th>
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($users)){
				$i = 1;
				foreach($users as $user){ ?>
					<tr>
						<th scope="row"><?= $i ?></th>
						<td><?= $user->first_name.' '.$user->last_name ?></td>
						<td><?= $user->email ?></td>
						<td><?= $user->phone ?></td>
						<td><?= $user->address ?></td>
						<td><i class="text-info fa fa-edit"></i></td>
						<td><i class="text-danger fa fa-trash"></i></td>
					</tr>
				<?php $i++; }
				} else{ ?>
				<tr>
					<th class="text-center" colspan="7">No data found</th>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include('inc/bottom.php') ?>
