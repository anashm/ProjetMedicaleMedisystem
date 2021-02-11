@extends('layouts.layout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
	<div class="container">

			<div class="row">
					<div class="col-lg-12">
							<div class="card card-custom" data-card="true" id="kt_card_1">
								<div class="card-header" style="background-color: #D6EFFF !important;">
									<div class="card-title">
										<i class="flaticon-user-add" style="color: black !important;"></i>&nbsp;&nbsp;&nbsp;<h3 class="card-label" style="font: normal normal 600 16px Poppins;">INFORMATIONS PATIENT</h3>
									</div>
									<div class="card-toolbar">
										<a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimiser">
											<i class="ki ki-arrow-down icon-nm"></i>
										</a>
										
									</div>
								</div>
								<div class="card-body">
									
												<div class="card-body">
													<div class="form-group row">
														<div class="col-lg-3">
															<label>CIN*</label>
															<input type="text" id="id_patient_cin" class="form-control" placeholder="Enter CIN" />
															
														</div>
														<div class="col-lg-3">
															<label>Nom*</label>
															<input type="text" id="id_nom_patient" class="form-control" placeholder="Entrer Le nom du patient" />
															
														</div>
														<div class="col-lg-3">
															<label>Prénom*</label>
															<input type="text" id="id_prenom_patient" class="form-control" placeholder="Entrer Le prénom du patient" />
														</div>
														<div class="col-lg-3">
															<label>Civilité*</label>
															<input type="text" id="id_civilite_patient" class="form-control" placeholder="Civilité" />
															
														</div>
													</div>

													<div class="form-group row">
														<div class="col-lg-3">
															<label>Tél</label>
															<input type="text" id="id_tel_patient" class="form-control" placeholder="Numéro de téléphone" />
															
														</div>
														<div class="col-lg-3">
															<label>Adresse</label>
															<input type="text" id="id_adresse_patient" class="form-control" placeholder="Entrer adresse" />
															
														</div>
														<div class="col-lg-3">
															<label>Date naissance*</label>
															<div class="input-group date">
																<input type="text" class="form-control" id="kt_datepicker_2" readonly="readonly" placeholder="Select date" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
															
														</div>
														<div class="col-lg-3">
															<label>Sexe</label>
															<div class="radio-inline">
																<label class="radio radio-solid">
																<input type="radio" id="radio_femme"  name="sexe_patient" checked="checked" value="femme" />
																<span></span>Femme</label>

																<label class="radio radio-solid">
																<input type="radio" id="radio_homme" name="sexe_patient" value="homme" />
																<span></span>Homme</label>

																<label class="radio radio-solid">
																<input type="radio" id="radio_enceinte" name="sexe_patient" value="femme_enceinte" />
																<span></span>Femme Enceinte</label>
															</div>
														</div>
														
													</div>


													<div class="form-group row">
														<div class="col-lg-2">
															<label>Allergie</label>
															<div class="radio-inline">
																<label class="radio radio-solid">
																<input type="radio" id="radio_allergie_oui"  name="allergie_patient"  value="oui_allergie" />
																<span></span>Oui</label>

																<label class="radio radio-solid">
																<input type="radio" id="radio_allergie_non" name="allergie_patient" value="nom_allergie" checked="checked" />
																<span></span>Non</label>

																
															</div>
														</div>
														<div class="col-lg-3" id="container_allergie">
															<label>Type d'Allergie</label>
															<input type="text" id="id_allergie" class="form-control" placeholder="Type d'Allergie" />
														</div>	

														<div class="col-lg-3" >
															<label>Medecin Traitants</label>
															<select  class="form-control medecin_traitant" name="medecin_traitant" id="id_medecin_traitants">

																
															</select>

														</div>
														<div  style="margin-top: 30px;">	

															<i class="flaticon2-plus text-primary" id="addMedecin" style="cursor: pointer;" ></i>
														</div>
														
													</div>	
													
													
												</div>
												
											
								</div>
							</div>
					</div>
			</div>
			<br><br>
			<div class="row">
					<div class="col-lg-12">
							<div class="card card-custom" data-card="true" id="kt_card_2">
								<div class="card-header"  style="background-color: #D6EFFF !important;">
									<div class="card-title">
										<i class="flaticon-medical" style="color: black !important;"></i>&nbsp;&nbsp;&nbsp;<h3 class="card-label" style="font: normal normal 600 16px Poppins;">VISITE</h3>
									</div>
									<div class="card-toolbar">
										<a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimiser">
											<i class="ki ki-arrow-down icon-nm"></i>
										</a>
										
									</div>
								</div>
								<div class="card-body">
									<div class="visite_container" style='display: flex;justify-content: space-between;width: 70%;margin-top:20px;'>
										
											<select name="salles" class="form-control salles_class">
												<option disabled selected >Choisir une salle</option>
												
											</select>
										
									
											<select name="type_examen" style="margin-left:20px;margin-right:20px;" class="form-control type_examen">

												<!-- <option value="examen1">examen1</option>
												<option value="examen2">examen2</option>
												<option value="examen3">examen3</option> -->
											</select>
									
										
											<i class="flaticon2-plus text-primary" id = "btnAddRow" style="cursor: pointer;" ></i>
											
											
									
									</div>

									
								    <hr />
								    <div id = "dvContainer"class="form-group row">
								    	
								    </div>
								</div>
							</div>
					</div>
			</div>
			<br><br>
			<div class="row">
					<div class="col-lg-12">
							<div class="card card-custom" data-card="true" id="kt_card_3">
								<div class="card-header"  style="background-color: #D6EFFF !important;">
									<div class="card-title">
										<i class="flaticon-list-1" style="color: black !important;"></i> &nbsp;&nbsp;&nbsp; <h3 class="card-label" style="font: normal normal 600 16px Poppins;">ENREGISTREMENT / COTATIONS</h3>
									</div>
									<div class="card-toolbar">
										<a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimiser">
											<i class="ki ki-arrow-down icon-nm"></i>
										</a>
										
									</div>
								</div>
								<div class="card-body">
										<div class="form-group row">
											<div class="col-lg-8">
												<table id="table_examens"  class="table table-striped table-bordered table-hover table-checkable order-column " data-toggle="context" data-target="#context-menu2">
							                    <thead>
							                        <tr>
							                        	<th  style="text-align: center;">Examen</th>
							                        	<th  style="text-align: center;">Prix unitaire</th>
							                            <th style="text-align: center;">Prix coté</th>
							                           	<th style="text-align: center;">Actions</th>
							                            
							                        </tr>
							                    </thead>
							                    <tbody data-toggle="context" >
							                    	<tr>
							                    		
							                    	</tr>

							                    </tbody>
							                    <tfoot>
										            <tr>
										                <th colspan="4" style="text-align:right">Total:</th>
										                <th ><span id="colonne_total">0</span></th>
										            </tr>
										        </tfoot>

							                    </table>
											</div>

										</div>


										<div class="form-group row">
											
											<div class="col-lg-3">
												<label>Vous avez une mutuelle</label>
												<div class="radio-inline">
													<label class="radio radio-solid">
													<input type="radio" name="example_2" checked="checked" value="2" />
													<span></span>Oui</label>
													<label class="radio radio-solid">
													<input type="radio" name="example_2" value="2" />
													<span></span>Non</label>
												</div>
												
											</div>
											<div class="col-lg-4">
												
												<select name="mutuelle" id="id_mutuelle" class="form-control">
													<option disabled selected >Choisir une mutuelle</option>
													<option value="Mutuelle1">Mutuelle1</option>
													<option value="Mutuelle2">Mutuelle2</option>
													<option value="Mutuelle3">Mutuelle3</option>
												</select>
												
											</div>
										</div>

											
										<button type="button" id="valider" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">enregistrer</button>
										
								</div>
							</div>
					</div>
			</div>
			
	</div>
</div>
<!-- modale fade -->

<div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Medecin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body ">
               <input type="text" class="form-control" id="id_nouveau_medecin" name="" placeholder="Entrer le nom du Medecin">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="close_modal" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="save_changes_medecin">Ajouter</button>
            </div>
        </div>
    </div>
</div>
<button id="lanch_modal" style="display: none;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
</button>
<!-- end modal -->


<!-- modale fade -->

<div class="modal fade" id="ModalPrixCote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Prix Coté</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body ">
               <input type="text" class="form-control" id="id_nouveau_prix_cote" name="" placeholder="Prix Coté">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="close_modal_prix_cote" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="save_prix_cote">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<button id="id_modal_prix_cote" style="display: none;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPrixCote">
    Launch demo modal
</button>
<!-- end modal -->

<div id="context-menu2">
   <ul class="dropdown-menu pull-left" role="menu">
   
       <li>
           <a   id="menu_modifier">
               <i class="fa fa-pencil fa-fw"></i> Modifier </a>
       </li>
       
       <li>
           <a  id="supprimer">
               <i class="fa fa-trash"></i> Supprimer </a>
       </li>
      
      

   </ul>
</div>

@endsection
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>


<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.fr.min.js') }}"></script>	
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   



$(document).ready(function(){

	$('#container_allergie').hide()

	var card1 = new KTCard('kt_card_1');
	var card2 = new KTCard('kt_card_2');
	var card3 = new KTCard('kt_card_3');

	$("#kt_datepicker_2").datepicker({             
        format:'dd/mm/yyyy',
        language:'fr'
    });


	$('#radio_allergie_oui').click(function(){
		$('#container_allergie').show()
	})

	$('#radio_allergie_non').click(function(){
		$('#container_allergie').hide()
	})


	var array_salles=[]
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('SalleController@getSalles')}}",
	                method: 'GET',
	                
	                success: function(data) {

	                	$.each(data, function(index, value) {
						   array_salles.push({ value : value.id, text : value.nom_salle  })
						    $('.salles_class').append($('<option>', { 
						        value: value.id,
						        text : value.nom_salle 
						    } ));
						});
	                
	                }
	            });

	            $.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('MedecinTraintantController@getAllMedecinTraitants')}}",
	                method: 'GET',
	                
	                success: function(data) {
	                	$('.medecin_traitant').append('<option disabled selected >Choisir un Medecin</option>')
	                	$.each(data, function(index, value) {
							
						    $('.medecin_traitant').append($('<option>', { 
						        value: value.id,
						        text : value.nom_medecin
						    } ));
						});
	                
	                }
	            });

	
		

	 $(document).on("change",'.salles_class', function(){
	
		  var id = this.value;
		  var hadi = this

		  		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('SalleController@getExamenFromSalle')}}",
	                method: 'POST',
	                data : {
	                	id : id
	                },
	                success: function(data) {
	                	$(hadi).closest('.visite_container').find('.type_examen').empty()
	                	//$(hadi).closest('.visite_container').find('.type_examen').css( "background-color", "red" );
	                	$(hadi).closest('.visite_container').find('.type_examen').append('<option disabled selected >Choisir un examen</option>')
	                	$.each(data, function(index, value) {
						  
						    $(hadi).closest('.visite_container').find('.type_examen').append($('<option>', { 
						        value: value.id,
						        text : value.nom_examen 
						    } ));
						});
	                	
	                }
	            });

	});

	 $('#addMedecin').click(function(){
	 	$('#lanch_modal').click()
	 })


	 $('#save_changes_medecin').click(function(){
	 		var nom_medecin = $('#id_nouveau_medecin').val()

	 		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('MedecinTraintantController@createMedecin')}}",
	                method: 'POST',
	                data : {
	                	nom_medecin : nom_medecin
	                },	                
	                success: function(data) {
	                	
	                	$('.medecin_traitant').append($('<option>', { 
						        value: data.id,
						        text : data.nom_medecin
						    } ));
	                	$('#close_modal').click();
	                	toastr.success('Medecin ajouté avec succés','');
	                }
	            });

	 })



	 $('#valider').click(function(){

	 	var salles_ids = $('.salles_class').map((_,el) => el.value).get()
	 	var examen_ids = $('.type_examen').map((_,el) => el.value).get()

	 	 
	 	
	 	if($("#radio_femme").prop("checked")) {
	 		var sexe_patient = 'femme'
	 	}
	 	else if($("#radio_homme").prop("checked")){
	 		var sexe_patient = 'homme'
	 	}
	 	else{
	 		var sexe_patient = 'femme_enceinte'
	 	}
	 	
	 	if(salles_ids.length != examen_ids.length){
	 		alert('Veuillez choisir un type examen pour chaque salle')
	 		return;
	 	}
	 		

	 	
	 	var cin = $('#id_patient_cin').val()
	 	var nom_patient = $('#id_nom_patient').val()
	 	var prenom_patient = $('#id_prenom_patient').val()
	 	var civilite_patient = $('#id_civilite_patient').val()
	 	var adresse_patient = $('#id_adresse_patient').val()
	 	var tel_patient = $('#id_tel_patient').val()
	 	var date_naissance = $('#kt_datepicker_2').val()
	 	var mutuelle = $('#id_mutuelle').val()
	 	var allergie = $('#id_allergie').val()

	 	if(nom_patient.length == 0 || prenom_patient.length == 0 || cin.length == 0 || civilite_patient.length== 0 || date_naissance.length == 0){
	 		alert('Certains champs sont oibligatoire !')
	 		return;
	 	}

	 	
	 			$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('PatientController@createPatient')}}",
	                method: 'POST',
	                data : {
	                	salles : salles_ids,
	                	examens : examen_ids,
	                	cin : cin,
	                	nom_patient : nom_patient,
	                	prenom_patient : prenom_patient,
	                	civilite_patient : civilite_patient,
	                	adresse_patient : adresse_patient,
	                	tel_patient : tel_patient,
	                	date_naissance : date_naissance,
	                	sexe_patient : sexe_patient,
	                	mutuelle : mutuelle,
	                	allergie : allergie
	                },
	                success: function(data) {
	                	toastr.success('Fiche patient créé avec succés','');
	                	setTimeout(function(){ window.location.href="{{action('PatientController@getAllPatients')}}" }, 1500);
	                }
	            });
	 })

	$('#btnAddRow').click(function(){
		 
            //Create a DropDownList element.
            var ddlCustomers = $("<select name='salles' class='form-control salles_class' />");
 			ddlCustomers.append("<option disabled selected >Choisir une salle</option>");
            //Add the Options to the DropDownList.
            $(array_salles).each(function () {
               var option = $("<option />");
 
                //Set Customer Name in Text part.
                option.html(this.text);
 
                //Set CustomerId in Value part.
                option.val(this.value);
 
                //Add the Option element to DropDownList.
                ddlCustomers.append(option);
            });



 
            //Reference the container DIV.
            var dvContainer = $("#dvContainer")
 
            //Add the DropDownList to DIV.
            //var div = $('<div class="form-group row"><div class="col-lg-3 ">')
            var div = $("<div class='visite_container' style='display: flex;justify-content: space-between;width: 70%;margin-top:20px;'/>");
            div.append(ddlCustomers);
 			
 			
 			div.append(`<select style="margin-left:20px;margin-right:20px;" name="type_examen" class="form-control type_examen">
												
											</select>`);


 			
            //Create a Remove Button.
            var btnRemove = $("<i type = 'button' class='flaticon-delete text-danger'></i>");
            
            btnRemove.click(function () {
                $(this).parent().remove();
                $(this).closest('.settings_row').find(".row_form").remove()
            });
 			

            //Add the Remove Buttton to DIV.
            div.append(btnRemove);
 			
            //Add the DIV to the container DIV.
            dvContainer.append(div);
          
           
	})

	var last_clicked;
	var oldMontant;
	var prix_cote;

	function round(value, exp) {
  if (typeof exp === 'undefined' || +exp === 0)
    return Math.round(value);

  value = +value;
  exp = +exp;

  if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
    return NaN;

  // Shift
  value = value.toString().split('e');
  value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

  // Shift back
  value = value.toString().split('e');
  return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
}

	$(document).on("click",'.edit_prix_cote', function(){
		 prix_cote = $(this).attr('id');
		
		$('#id_modal_prix_cote').click()
		$('#id_nouveau_prix_cote').val(prix_cote)

		last_clicked = this
		
		
		
	})

	$(document).on("click",'#save_prix_cote', function(){
		var new_prix = $('#id_nouveau_prix_cote').val()
		var old_total = $('#colonne_total').text()
		var old_prix = prix_cote

		var newTotal = 	parseFloat(old_total) - parseFloat(old_prix) + parseFloat(new_prix)

		 $(last_clicked).closest('td').siblings(':eq(2)').text(new_prix);

		 $('#close_modal_prix_cote').click()

		 $('#colonne_total').text(round(newTotal,2)+' MAD')
		 
	})
	
	$(document).on("click",'.delete_prix_cote', function(){
		var old_total = $('#colonne_total').text()
		var old_prix_row = $(this).closest('td').siblings(':eq(2)').text()
		
		
		$(this).closest("tr").remove();
		var newTotal = 	parseFloat(old_total) - parseFloat(old_prix_row)
		$('#colonne_total').text(round(newTotal,2)+' MAD')
	})

	$(document).on("change",'.type_examen', function(){

		var id_examen = this.value;
		
		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('ExamenController@GetMontantExamen')}}",
	                method: 'POST',
	                data : {
	                	id_examen : id_examen
	                },
	                success: function(data) {
	                	 oldMontant = $('#colonne_total').text()
	                	console.log(oldMontant)
	                	newRow = `<tr>
	                				<td>${data.nom_examen}</td>
	                				<td>${data.montant}</td>
	                				<td ><span class="prix_cote">${data.montant}</span></td>
	                				<td>
	                				<i title="Modifier Prix coté" class="flaticon-edit edit_prix_cote" id="${data.montant}"  style="cursor: pointer;color:blue"></i>
	                				<i style="cursor: pointer; margin-left:5px;color:blue" title="Supprimer ligne" class='flaticon-delete delete_prix_cote'></i>
	                				</td>
	                				</tr>`;

	                	$("#table_examens tbody").append(newRow);	
	                	var newMontant  = parseFloat(oldMontant ) + parseFloat(data.montant)
	                	//console.log(parseFloat(data.montant),parseFloat(oldMontant ))
	                	$('#colonne_total').text(newMontant+' MAD')		
	                }
	            });

	})	

	$.noConflict();

	var table = $('#table_examens').DataTable({
                       	 dom: 'Brtip',
                       	 "bFilter": false,
					      buttons: [
					           'csv'
					      ] ,

                    });



	$('#table_examens').on( 'mousedown', 'tr', function () {
    	lastclicked_mp = $(this);
    	$('#context-menu2').show();
  });

})
</script>