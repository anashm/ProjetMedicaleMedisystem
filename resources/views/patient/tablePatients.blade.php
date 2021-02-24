@extends('layouts.layout')
@section('content')

<style type="text/css">
	#cke_1_contents{
		height: 400px !important;
	}
</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />


<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
	<div class="container">

			<div class="row">
					<div class="col-lg-12">

						<table id="my_table" class="table table-striped table-bordered table-hover table-checkable order-column ">
		                    <thead>
		                        <tr>
		                        	<th hidden style="text-align: center;">ID</th>
		                        	<th  style="text-align: center;">Date_creation</th>
		                            <th style="text-align: center;">Nom</th>
		                            <th style="text-align: center;">Prénom</th>
		                            <th style="text-align: center;">Salle</th>
		                            <th style="text-align: center;">Nom Examen</th>
		                            <th style="text-align: center;">Montant</th>
		                            <th hidden style="text-align: center;">Nom Medecin</th>
		                            <th style="text-align: center;">Compte Rendu</th>
		                            <th hidden style="text-align: center;">Date_naissance</th>
		                            
		                        </tr>
		                    </thead>
		                    <tbody data-toggle="context" data-target="#context_secteur">
		                         @foreach($patients as $patient)
		                            <tr>
		                            	<td hidden style="text-align: center;"> {{ $patient->id_visite }} </td>
		                            	<td  style="text-align: center;"> 
		                              	{{\Carbon\Carbon::parse($patient->date_creation)->format('Y-m-d')}}</td>
		                                <td style="text-align: center;"> {{ $patient->nom }} </td>
		                                <td style="text-align: center;">{{ $patient->prenom }}</td>
		                                <td style="text-align: center;">{{ $patient->nom_salle }}</td>
		                                <td style="text-align: center;">{{ $patient->nom_examen }}</td>
		                                <td style="text-align: center;">{{ $patient->prix_cote }} MAD</td>
		                                <td hidden style="text-align: center;">{{ $patient->nom_medecin }}</td>
		                               
		                                	@if($patient->updated_compte_rendu == 0)
		                              		<td style="text-align: center;"  class="donwload_file">
		                              			<i class="flaticon-file-1" id="download{{ $patient->id_visite }}"  style="cursor: pointer;color: red"></i>
		                              		 
		                              		</td>
		                              		@else
		                              			<td style="text-align: center;"  class="donwload_file">
		                              				<i class="flaticon-file-1" id="download{{ $patient->id_visite }}"  style="cursor: pointer;color: green"></i>
		                              		 
		                              			</td>
		                              		@endif
		                              	
		                              	<td hidden style="text-align: center;">
		                              	{{\Carbon\Carbon::parse($patient->date_naissance)->format('Y-m-d')  }}</td>
		                              	
		                            </tr>
                        		@endforeach 
		                    </tbody>
	                	</table>

					</div>
			</div>
	</div>
</div>


<!-- modale fade -->

<div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Compte Rendu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body modal-lg">
                <div id="editor">
													        

				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="close_modal" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="save_changes">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<button id="lanch_modal" style="display: none;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
</button>
<!-- end modal -->


<input type="hidden" id="id_hidden_row" name="">
<input type="hidden" id="id_hidden_row_name_patient" name="">
<input type="hidden" id="id_hidden_row_prenom_patient" name="">
<input type="hidden" id="id_hidden_row_medecin_traitant" name="">
<input type="hidden" id="id_hidden_row_examen_patient" name="">
<input type="hidden" id="id_hidden_row_naissance_patient" name="">
<input type="hidden" id="id_hidden_row_date_creation" name="">
@endsection

<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>




<script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
   



$(document).ready(function(){


var editor = CKEDITOR.replace('editor')
$.noConflict();


	var table =$('#my_table').DataTable({
                        dom: 'Bfrtip',
				        buttons: [{

						         extend: 'excel',
						         // text:'<i class="fa fa-files-o"></i>',
						         filename: 'Liste Patients Medisysteme',
						         exportOptions: {
						           columns: ':visible'
						          
						        }


						        }
				            
				            
				        ],
				        "lengthMenu": [10, 15, 25, 50],
				         "language": {
			                            "select": {
			                                "rows": "%d ligne"
			                            },
			                            "searchPlaceholder": "Chercher ",
			                            "sProcessing": "Traitement en cours...",
			                            "sSearch": "",
			                            "sLengthMenu": "Afficher _MENU_",
			                            "sInfo": "_START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
			                            "sInfoEmpty": "0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
			                            "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
			                            "sInfoPostFix": "",
			                            "sLoadingRecords": "Chargement en cours...",
			                            "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
			                            "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
			                            "oAria": {
			                                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
			                                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
			                            },

			                        },
			            "columnDefs":[
					        {
					          'targets':[1,2,3]
					        }
					      ]
                    });

		


	$(document).on("click",'.donwload_file', function(){
		
		
		var idVisite = $('#id_hidden_row').val()
		var nom_patient = $('#id_hidden_row_name_patient').val()
		var prenom_patient = $('#id_hidden_row_prenom_patient').val()
		var adresse_patient = $('#id_hidden_row_adresse_patient').val()
		var examen_patient = $('#id_hidden_row_examen_patient').val()
		var date_creation = $('#id_hidden_row_date_creation').val()
		var date_naissance = $('#id_hidden_row_naissance_patient').val()
		var medecin_traitant = $('#id_hidden_row_medecin_traitant').val()
		
		dob = new Date(date_naissance);
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));


		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('PatientController@downloadWordFile')}}",
	                method: 'POST',
	                data : {
	                
	                	idVisite : idVisite
	                	
	                },
	                success: function(data) {
	                	var edata = data;
	                		
	                		//var count_string = (edata.match(/prenom_patient/g) || []).length;
	                		//to mesure ch7al mn occ dial klma f text kamal , khass dir for loop
		                	var replaced_name = edata.replace("name_patient", nom_patient); 
		                	 replaced_prenom = replaced_name.replace("prenom_patient", prenom_patient);
		                	 replaced_adresse = replaced_prenom.replace("adresse_patient",adresse_patient) 
		                	 replaced_examen = replaced_adresse.replace("examen_patient",examen_patient)
		                	 replaced_date_creation = replaced_examen.replace("date_examen",date_creation)
		                	 replaced_age = replaced_date_creation.replace("age_patient",age)
		                	 replaced_medecin = replaced_age.replace("medecin_traitant",medecin_traitant)

	                
	                
       					 editor.setData(replaced_medecin);

	                		
	                	$('#lanch_modal').click();
			            

	                }
	            });
		

	})



	$(document).on("click",'#save_changes', function(){

			var idVisite = $('#id_hidden_row').val()
			var compte_rendu = editor.getData();

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$.ajax({
                url: "{{action('PatientController@SaveCompteRendu')}}",
                method: 'POST',
                data : {
                
                	idVisite : idVisite,
                	compte_rendu : compte_rendu
                	
                },
                success: function(data) {
                	$('#close_modal').click();
                	toastr.success('Compte Rendu Modifié avec succés','');
                	$('#download'+idVisite).css( "color", "green" );
		
		
                          
                }
            });


	})



	$('#my_table').on( 'click', 'tr', function () {

	    idVisite= table.row( this ).data()[0];
	    nomPatient= table.row( this ).data()[2];
	    prenomPatient= table.row( this ).data()[3];
	    MedecinTraitant= table.row( this ).data()[7];
	    examenPatient = table.row( this ).data()[5];
	    datenaissancePatient = table.row( this ).data()[9];
	    date_creation = table.row( this ).data()[1];

	    $('#id_hidden_row').val(idVisite)
	    $('#id_hidden_row_prenom_patient').val(prenomPatient)
	    $('#id_hidden_row_name_patient').val(nomPatient)
	    $('#id_hidden_row_medecin_traitant').val(MedecinTraitant)
	    $('#id_hidden_row_examen_patient').val(examenPatient)
	   	$('#id_hidden_row_naissance_patient').val(datenaissancePatient)
	   	$('#id_hidden_row_date_creation').val(date_creation)

  	});

})
</script>