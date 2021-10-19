<!-- Modal -->
<div class="modal fade" id="addRowModal1{{$ba->id}}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Edit</span>
					<span class="fw-light">
						Category
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form method="post" action="{{route('kategory.edit',$ba->id)}}" role="form">
				@csrf
				@method('PUT')
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Edit Kategori</label>
								<input name="nama_kategori" value="{{$ba->nama_kategori}}" type="text" class="form-control" placeholder="fill name">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" id="addRowButton" class="btn btn-primary">Edit</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>