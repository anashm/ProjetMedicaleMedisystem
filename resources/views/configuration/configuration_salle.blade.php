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
										<h3 class="card-label">CONFIGURATION SALLES	</h3>
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
															<label>Saisir une nouvelle Salle</label>
															<input type="text" id="id_salle" class="form-control" placeholder="Enter nom Salle" />
															
														</div>
												</div>		
														<br><br><br>
														<button type="button" id="create_salle" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">enregistrer</button>
												
											 </div>





											<div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
												
												<div class="form-group row">
														<div class="col-lg-5">
															<select id="salles_modifie" class="form-control salles_class">
																<option disabled selected >Choisir une salle</option>
																
															</select>
															
														</div>
												</div>

												<div class="form-group row">
														<div class="col-lg-5">
															<input type="text" id="id_nom_salle_modifiee" class="form-control" placeholder="Choisir une salle" />
															<input type="hidden" id="hidden_salle_modif" name="">
														</div>
												</div>
												<br><br><br>
														<button type="button" id="modifier_salle" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Modifier</button>
											</div>





											<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
												


												<div class="form-group row">
														<div class="col-lg-5">
															<select id="salles_delete" class="form-control salles_class">
																<option disabled selected >Choisir une salle</option>
																
															</select>
															
														</div>
												</div>
												<br><br><br>
														<button type="button" id="supprimer_salle" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Supprimer</button>

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
	                url: "{{action('SalleController@getSalles')}}",
	                method: 'GET',
	                
	                success: function(data) {

	                	$.each(data, function(index, value) {
						   
						    $('.salles_class').append($('<option>', { 
						        value: value.id,
						        text : value.nom_salle 
						    } ));
						});
	                
	                }
	            });


		$(document).on("change",'#salles_modifie', function(){
	
		  var id = this.value;

		  var text = $("#salles_modifie :selected").text();
		  console.log(text)
		  $('#id_nom_salle_modifiee').val(text)
		  $('#hidden_salle_modif').val(id)

		})


	$('#modifier_salle').click(function(){
		var nom_salle = $('#id_nom_salle_modifiee').val()
		var id_salle = $('#hidden_salle_modif').val()


		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('SalleController@updateSalle')}}",
	                method: 'POST',
	                data : {
	                	nom_salle : nom_salle,
	                	id_salle : id_salle
	                },
	                success: function(data) {
	                	toastr.success('Salle modifiée avec succés','');
	                	setTimeout(function(){ location.reload(); }, 1000);
	                
	                }
	            });

	})


	$('#supprimer_salle').click(function(){
		var id = $("#salles_delete").val()

		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('SalleController@deleteSalle')}}",
	                method: 'POST',
	                data : {
	                	id : id
	                	
	                },
	                success: function(data) {
	                	toastr.success('Salle supprimée','');
	                	 
                       setTimeout(function(){ location.reload(); }, 1000);
	                
	                }
	            });
	})

	$('#create_salle').click(function(){
			var nom_salle = $('#id_salle').val()

				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('SalleController@createSalle')}}",
	                method: 'POST',
	                data : {
	                	nom_salle : nom_salle
	                },
	                success: function(data) {
	                	toastr.success('Salle créer avec succés','');
	                	setTimeout(function(){ location.reload(); }, 1000);
	                
	                }
	            });
	})



})



</script>