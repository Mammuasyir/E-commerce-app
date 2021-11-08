<!-- Modal -->
<div class="modal fade" id="addRowModal3" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						Edit</span>
					<span class="fw-light">
						Status
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form method="post" action="{{route('pending.edit')}}" role="form">
				@csrf
				@method('PUT')
                <input type="hidden" value="{{$pe->id}}" name="id">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Edit Status</label>
								<select class="form-select" name="status">
                                                <option value="">Pilih Status</option>

                                                <option value="1">Pending</option>
												<option value="2" >Lunas</option>
                                                <option value="3" >Terkirim</option>
                                                
											</select>
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