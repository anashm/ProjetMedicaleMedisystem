@extends('layouts.layout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
    <div class="container">

		<div class="row">
				<div class="col-md-12 ">
					

					<div class="card card-custom" data-card="true" >
								<div class="card-header" style="background-color: #D6EFFF !important;">
									<div class="card-title">
										<h3 class="card-label">CONFIGURATION MEDECIN TRAITANTS</h3>
									</div>
									
								</div>
								<div class="card-body">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="creation-tab" data-toggle="tab" href="#creation">
													<span class="nav-icon">
														<i class="flaticon2-medical-records"></i>
													</span>
													<span class="nav-text">Création</span>
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile">
													<span class="nav-icon">
														<i class="flaticon2-pen"></i>
													</span>
													<span class="nav-text">Modification</span>
												</a>
											</li>
											
											<li class="nav-item">
												<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" aria-controls="contact">
													<span class="nav-icon">
														<i class="flaticon-delete"></i>
													</span>
													<span class="nav-text">Suppression</span>
												</a>
											</li>

											<!-- <li class="nav-item">
												<a class="nav-link" id="liste-tab" data-toggle="tab" href="#liste_salles" aria-controls="liste_salles">
													<span class="nav-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
													<span class="nav-text">Liste Salles</span>
												</a>
											</li> -->
									</ul>


										<div class="tab-content mt-5" id="myTabContent">
											<div class="tab-pane fade active show" id="creation" role="tabpanel" aria-labelledby="creation-tab">

												<div class="form-group row">
														<div class="col-lg-5">
															<label>Saisir un nouveau medecin</label>
															<input type="text" id="id_medecin" class="form-control" placeholder="Entrer nom medecin" />
															
														</div>
												</div>		
														<br><br><br>
														<button type="button" id="create_medecin" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">enregistrer</button>
												
											 </div>





											<div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
												
												<div class="form-group row">
														<div class="col-lg-5">
															<select id="medecin_modifie" class="form-control medecin_traitants">
																<option disabled selected >Choisir un Medecin</option>
																
															</select>
															
														</div>
												</div>

												<div class="form-group row">
														<div class="col-lg-5">
															<input type="text" id="id_nom_medecin_modifiee" class="form-control" placeholder="Choisir un Medecin" />
															<input type="hidden" id="hidden_medecin_modif" name="">
														</div>
												</div>
												<br><br><br>
														<button type="button" id="modifier_salle" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Modifier</button>
											</div>





											<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
												


												<div class="form-group row">
														<div class="col-lg-5">
															<select id="medecin_delete" class="form-control medecin_traitants">
																<option disabled selected >Choisir un Medecin</option>
																
															</select>
															
														</div>
												</div>
												<br><br><br>
														<button type="button" id="supprimer_medecin" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Supprimer</button>

											</div>






											<!-- <div class="tab-pane fade" id="liste_salles" role="tabpanel" aria-labelledby="liste-tab">Voici la liste</div> -->
										</div>
									</div>		
								</div>

					</div>	
				</div>
		</div>
	</div>
</div>
@endsection


<script src="{{ URL::asset('js/jquery.min.js') }}"></script>

<script type="text/javascript">
   



$(document).ready(function(){


				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('MedecinTraintantController@getAllMedecinTraitants')}}",
	                method: 'GET',
	                
	                success: function(data) {

	                	$.each(data, function(index, value) {
						   
						    $('.medecin_traitants').append($('<option>', { 
						        value: value.id,
						        text : value.nom_medecin 
						    } ));
						});
	                
	                }
	            });


		$(document).on("change",'#medecin_modifie', function(){
	
		  var id = this.value;

		  var text = $("#medecin_modifie :selected").text();
		  
		  $('#id_nom_medecin_modifiee').val(text)
		  $('#hidden_medecin_modif').val(id)

		})


	$('#modifier_salle').click(function(){
		var nom_medecin = $('#id_nom_medecin_modifiee').val()
		var id_medecin = $('#hidden_medecin_modif').val()


		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('MedecinTraintantController@updateMedecin')}}",
	                method: 'POST',
	                data : {
	                	nom_medecin : nom_medecin,
	                	id_medecin : id_medecin
	                },
	                success: function(data) {
	                	toastr.success('Medecin modifié avec succés','');
	                	setTimeout(function(){ location.reload(); }, 1000);
	                
	                }
	            });

	})


	$('#supprimer_medecin').click(function(){
		var id = $("#medecin_delete").val()

		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('MedecinTraintantController@deleteMedecin')}}",
	                method: 'POST',
	                data : {
	                	id : id
	                	
	                },
	                success: function(data) {
	                	toastr.success('Medecin supprimé','');
	                	 
                       setTimeout(function(){ location.reload(); }, 1000);
	                
	                }
	            });
	})

	$('#create_medecin').click(function(){
			var nom_medecin = $('#id_medecin').val()

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
	                	toastr.success('Medecin créer avec succés','');
	                	setTimeout(function(){ location.reload(); }, 1000);
	                
	                }
	            });
	})



})



</script>