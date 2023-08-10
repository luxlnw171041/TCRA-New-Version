@extends('layouts.theme')

@section('content')

	<div class="card-body">
		<div class="table-responsive">

			<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
			
				<div class="row">
					<div class="col-sm-12">
						<table id="example2" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="2" colspan="1" aria-sort="ascending">
										ลำดับ
									</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">
										Position
									</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">	
										Office
									</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">
										Age
									</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">
										Start date
									</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">
										Salary
									</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">
										Start date
									</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1">
										Salary
									</th>

									<tr>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;">ลำดับ</th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;">เลขที่สมาชิก</th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;">บริษัท</th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;">สิทธิ์การใช้งาน</th>
                                        <th colspan="2" style="color:#02ad13;">บันทึก (ครั้ง)</th>
                                        <th colspan="2" style="color:blue;">ค้นหา (ครั้ง)</th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;">สถานะ</th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;">เพิ่มเติม</th>
                                    </tr>
								</tr>
							</thead>
							<tbody>
								<tr role="row" class="odd">
									<td class="sorting_1">Airi Satou</td>
									<td>Accountant</td>
									<td>Tokyo</td>
									<td>33</td>
									<td>2008/11/28</td>
									<td>$162,700</td>
									<td>$162,700</td>
									<td>$162,700</td>
								</tr>
								<tr role="row" class="even">
									<td class="sorting_1">Angelica Ramos</td>
									<td>Chief Executive Officer (CEO)</td>
									<td>ลอนดอน</td>
									<td>47</td>
									<td>2009/10/09</td>
									<td>$1,200,000</td>
									<td>$1,200,000</td>
									<td>$1,200,000</td>
								</tr>
								<tr role="row" class="odd">
									<td class="sorting_1">Ashton Cox</td>
									<td>Junior Technical Author</td>
									<td>San Francisco</td>
									<td>66</td>
									<td>2009/01/12</td>
									<td>$86,000</td>
									<td>$86,000</td>
									<td>$86,000</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th rowspan="1" colspan="1">Name</th>
									<th rowspan="1" colspan="1">Position</th>
									<th rowspan="1" colspan="1">Office</th>
									<th rowspan="1" colspan="1">Age</th>
									<th rowspan="1" colspan="1">Start date</th>
									<th rowspan="1" colspan="1">Salary</th></tr>
							</tfoot>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<!--app JS-->
	<script src="{{ asset('/theme/js/app.js') }}"></script>
	
    <!--plugins-->
    <script src="{{ asset('/theme/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/theme/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	
	
	<script>
		$(document).ready(function() {
			// var table = $('#example2').DataTable( {
			// 	lengthChange: false,
			// } );
		 
			// table.buttons().container()
			// 	.appendTo( '#example2_wrapper .col-md-6:eq(0)' );

			    $("#example2 tfoot th").each(function () {
			        if($(this).text()){
			            var title = $(this).text();
			            $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title + '" />');
			        }
			    });
			    // DataTable initialisation
			    var table = $("#example2").DataTable({
			        dom: '<"dt-buttons"Bf><"clear">lirtp',
			        paging: true,
			        autoWidth: true,
			        lengthChange: false,
			        buttons: [
		                {
		                    extend: "excelHtml5",
		                    text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
		                },
		            ],
			        initComplete: function (settings, json) {
			            var footer = $("#example2 tfoot tr");
			            $("#example2 thead").append(footer);
			        }
			    });

			    // Apply the search
			    $("#example2 thead").on("keyup", "input", function () {
			            table.column($(this).parent().index())
			            .search(this.value)
			            .draw();
			        });
		} );
	</script>


@endsection
