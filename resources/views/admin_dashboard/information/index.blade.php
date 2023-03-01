@extends("admin_dashboard.layouts.app")
		
    @section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection


		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Contacts</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Information</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
                    <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Id</th>
										<th>Slogan</th>
										<th>Position</th>
										<th>Address</th>
										<th>Mobile</th>
                                        <th>Email</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                  @foreach($information as $informations)
									<tr>
										<td>{{$informations->id}}</td>
										<td>{{$informations->slogan}}</td>
										<td>{{$informations->position}}</td>
										<td>{{$informations->address}}</td>
                                        <td>{{$informations->mobile}}</td>
                                        <td>{{$informations->email}}</td>
                                        <td>{{$informations->website}}</td>
										<td>
											<div class="d-flex order-actions">
												
												<a href="{{ route('admin.information.edit', $informations) }}" class=""><i class='bx bxs-edit'></i></a>
												<a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $informations->id}}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
											
                                                <form method='post' action="{{ route('admin.information.destroy', $informations) }}" id='delete_form_{{ $informations->id}}'>
													@csrf @method('DELETE')
												</form>
                                            </div>
										</td>
									</tr>
                               @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
                        
					</div>
				</div>


			</div>
		</div>
		<!--end page wrapper -->
		@endsection
	

    @section("script")

    <script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: ['excel']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		
            setTimeout(() => {
                $(".general-message").fadeOut();
            }, 5000);
        
        });
	</script>
    @endsection