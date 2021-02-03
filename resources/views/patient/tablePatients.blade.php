@extends('layouts.layout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />


<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
	<div class="container">

			<div class="row">
					<div class="col-lg-12">

						<table id="my_table" class="table table-striped table-bordered table-hover table-checkable order-column ">
		                    <thead>
		                        <tr>
		                            <th style="text-align: center;">Nom</th>
		                            <th style="text-align: center;">Prénom</th>
		                            <th style="text-align: center;">Salle</th>
		                            <th style="text-align: center;">Nom Examen</th>
		                            <th style="text-align: center;">Montant</th>
		                            
		                        </tr>
		                    </thead>
		                    <tbody data-toggle="context" data-target="#context_secteur">
		                         @foreach($patients as $patient)
		                            <tr>
		                                <td style="text-align: center;"> {{ $patient->nom }} </td>
		                                <td style="text-align: center;">{{ $patient->prenom }}</td>
		                                <td style="text-align: center;">{{ $patient->nom_salle }}</td>
		                                <td style="text-align: center;">{{ $patient->nom_examen }}</td>
		                                <td style="text-align: center;">{{ $patient->montant }}MAD</td>
		                              
		                            </tr>
                        		@endforeach 
		                    </tbody>
	                	</table>

					</div>
			</div>
	</div>
</div>






@endsection

<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   



$(document).ready(function(){

$.noConflict();
	$('#my_table').DataTable({
                        "orderClasses": false,
                        "select": "single",
                        "bPaginate": true,
                        "paging": true,
                        "lengthMenu": [5, 10, 15, 25, 50],
                        "language": {
                            "select": {
                                "rows": "%d ligne"
                            },
                            "searchPlaceholder": "Chercher secteur",
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
                        "info": false
                    });

})
</script>