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
										<h3 class="card-label">CONFIGURATION EXAMENS	</h3>
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
															<select id="salles_creation" class="form-control salles_class">
																<option disabled selected >Choisir une salle</option>
																
															</select>
															
														</div>
												</div>	

												<div class="form-group row">
														<div class="col-lg-5">
															<label>Saisir un nouvel examen</label>
															<input type="text" id="id_new_examen" class="form-control" placeholder="Enter nom Examen" />
															
														</div>
														<div class="col-lg-5">
															<label>Montant</label>
															<input type="number" id="id_montant_creation" class="form-control" placeholder="Entrer le montant" />
															
														</div>
												</div>	



												<div class="form-group row">
		                                          <div class="col-lg-2">
		                                            <label>Compte rendu :</label>
		                                           	
		                                          </div>
		                                          <div class="col-lg-2">
			                                          <div class="btn btn-primary btn-sm float-left">
			                                              <span>Select your file</span>
			                                              <input type="file" name="thumbnail" id="id_thumbnail">
			                                            </div>
		                                           </div>
		                                          
		                                        </div>

                                                 


														<br><br><br>
														<button type="button" id="create_examen" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">enregistrer</button>
												
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
															<select name="type_examen" id="id_type_examen" class="form-control type_examen">

															</select>
														</div>
												</div>


												<div class="form-group row">
														<div class="col-lg-5">
															<label>Saisir le nouvel nom d'examen</label>
															<input type="text" id="id_new_examen_modif" class="form-control" placeholder="Enter nom Examen" />
															
														</div>
														<div class="col-lg-5">
															<label>Montant</label>
															<input type="number" id="id_montant_modif" class="form-control" placeholder="Entrer le montant" />
															
														</div>
												</div>
												<input type="hidden" id="id_base_url" value="{{ url('/') }}" name="">
												
												<a id="id_link_download" href="" download>Visualiser le compte rendu</a>
												<br><br><br>
												<div class="form-group row">
		                                          <div class="col-lg-4">
		                                            <label>Pour modifier le compte rendu,veuillez choisir un autre (l'ancien sera écrasé)</label>
		                                           	
		                                          </div>
		                                          <div class="col-lg-2">
			                                          <div class="btn btn-primary btn-sm float-left">
			                                              <span>Select your file</span>
			                                              <input type="file" name="thumbnail_modif" id="id_thumbnail_modif">
			                                            </div>
		                                           </div>
		                                          
		                                        </div>
		                                        <br><br><br>
													<input type="hidden" id="examen_selected" name="">
														<button type="button" id="modifier_examen" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Modifier</button>
											</div>





											<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
												


												<div class="form-group row">
														<div class="col-lg-5">
															<select id="salles_delete" class="form-control salles_class">
																<option disabled selected >Choisir une salle</option>
																
															</select>
															
														</div>
												</div>
												<div class="form-group row">
														<div class="col-lg-5">
															<select name="type_examen" id="id_type_examen_delete" class="form-control type_examen">

															</select>
														</div>
												</div>
												<br><br><br>
														<button type="button" id="supprimer_examen" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Supprimer</button>

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

		$('#id_link_download').hide();






		$(document).on("change",'#salles_modifie', function(){
			
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
	                	$('#id_type_examen').empty()
	                	//$(hadi).closest('.visite_container').find('.type_examen').css( "background-color", "red" );
	                	$('#id_type_examen').append('<option disabled selected >Choisir un examen</option>')
	                	$.each(data, function(index, value) {
						  
						    $('#id_type_examen').append($('<option>', { 
						        value: value.id,
						        text : value.nom_examen 
						    } ));
						});
	                	
	                }
	            });

	});



		$(document).on("change",'#salles_delete', function(){
			
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
	                	$('#id_type_examen_delete').empty()
	                	//$(hadi).closest('.visite_container').find('.type_examen').css( "background-color", "red" );
	                	$('#id_type_examen_delete').append('<option disabled selected >Choisir un examen</option>')
	                	$.each(data, function(index, value) {
						  
						    $('#id_type_examen_delete').append($('<option>', { 
						        value: value.id,
						        text : value.nom_examen 
						    } ));
						});
	                	
	                }
	            });

	});


			$(document).on("change",'#id_type_examen', function(){

				var id = this.value;
		  		var hadi = this
		  		var base_url = $('#id_base_url').val()

			  		$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});

					$.ajax({
		                url: "{{action('ExamenController@getInfosFromExamenId')}}",
		                method: 'POST',
		                data : {
		                	id : id
		                },
		                success: function(data) {
		                	console.log(data)
		                	$('#examen_selected').val(data.id)
		                	$('#id_new_examen_modif').val(data.nom_examen)
		                	$('#id_montant_modif').val(data.montant)
		                	if(data.compte_rendu){
		                		$('#id_link_download').show()
		                		$('#id_link_download').prop("href", base_url+'/'+data.compte_rendu)

		                	}
		                }
		            });
			})


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


		$('#create_examen').click(function(){

			var examen = $('#id_new_examen').val()
			var salle = $('#salles_creation').val()
			var montant = $('#id_montant_creation').val()

			var formData = new FormData();


			formData.append("thumbnail",$("#id_thumbnail").prop("files")[0]);
			formData.append("examen",examen);
			formData.append("salle",salle);
			formData.append("montant",montant);

			$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				

				$.ajax({
                        type: 'POST',
                        url: "{{action('ExamenController@createExamen')}}",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data : formData ,
                        
                        success: function(data){
                          	toastr.success('Examen créé avec succés','');
	                		setTimeout(function(){ location.reload(); }, 2000);
                           
                        },
                        error: function(){
                         // alert('Something is missing in your form');
                        }
                    });

		})


		$('#modifier_examen').click(function(){
			
			var id_exam = $('#id_type_examen').val()
			var nom_exam = $('#id_new_examen_modif').val()
			var montant = $('#id_montant_modif').val()
			

			var formData = new FormData();


			formData.append("id_exam",id_exam);
			formData.append("nom_exam",nom_exam);
			formData.append("montant",montant);

			if($("#id_thumbnail_modif").prop("files")[0]){
				formData.append("thumbnail_modif",$("#id_thumbnail_modif").prop("files")[0]);
			}

			$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				

				$.ajax({
                        type: 'POST',
                        url: "{{action('ExamenController@updateExamen')}}",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data : formData ,
                        
                        success: function(data){
                          	toastr.success('Examen modifié avec succés','');
	                		setTimeout(function(){ location.reload(); }, 2000);
                           
                        },
                        error: function(){
                         // alert('Something is missing in your form');
                        }
                    });
		})	


		$('#supprimer_examen').click(function(){

			var id_exam = $('#id_type_examen_delete').val()


			$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
	                url: "{{action('ExamenController@deleteExamen')}}",
	                method: 'POST',
	                data : {
	                	id_exam : id_exam
	                },
	                success: function(data) {

	                	toastr.success('Examen supprimé avec succés','');
	                	setTimeout(function(){ location.reload(); }, 2000);
	                
	                }
	            });
		})

})



</script>