@extends('layout')
@section('pageTitle')
 Personnel |Ariosh-Offshore
@endsection
@section('styles')
    <style>
        th {
            text-align: center !important;
        }
        td {
            text-align: center !important;
        }
        .table .thead-theme th {
            color: #fff;
            background-color: #002545 !important;
            border-color: #002545;
        }
    </style>
@endsection
@section('content')
    <main class="content-wrapper">
        <div class="container">
           <div class="row hideme" > <div class="col-md-6"><h3>Personnel Profile</h3></div><div class="col-md-3"><button  class="pull-right personnels btn btn-success btn-md" onclick="printInfo()">Print</button></div>  <div class="col-md-3"><span class=""> <button data-toggle="modal"  data-phone="{{$personnel->phone_number}}" data-p_id="{{$personnel->id}}" data-name="{{$personnel->name}}"  data-number="{{$personnel->phone_number}}" data-company="{{$personnel->company}}" data-designation="{{$personnel->designation}}" data-employment_status="{{$personnel->employment_status}}" data-email="{{$personnel->email}}" data-category="{{$personnel->category}}" data-country="{{$personnel->country}}" data-nationality="{{$personnel->nationality}}" class="personnels btn btn-primary btn-md" >Update personnel</button> </span></div>  </div> 
            <hr>
            <div class="row" id="printinfo">
                <div class="col-md-6 mb-4">
                    <h5 class="text-secondary">Personal Information</h5>
                    <div class="card">
                        <div class="card-body row">
                            <div class="col">
                                    <img class="img-thumbnail" width="250" @if(isset($personnel->image))  src="{{url('storage/app')}}/{{$personnel->image}}" @else src="{{url('images/engineer.png')}}" @endif alt="Card image cap">
                            </div>
                            <div class="col">
                                    <h5 class="card-text">{{$personnel->name}} <small>{{$personnel->nationality}} {{($personnel->nationality == 'Expatriate') ? '('.$personnel->country.')' : ''}}</small> </h5>
                                    <p class="mb-1">{{$personnel->email}}</p>
                                    <p class="mt-0">{{$personnel->phone_number}}</p>
                            </div>      
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="text-secondary">Company Information</h5>
                    <div class="card">
                        <div class="card-body row pt-5">
                            <div class="col">
                                <p class="mb-1 mt-0">Company: {{$personnel->company}}</p>
                                <p class="mb-1 mt-0">Designation: {{$personnel->designation}}</p>
                                <p class="mb-1 mt-0">Employment Status: {{$personnel->employment_status}}</p>
                                <p class="mb-1 mt-0">Category: {{$personnel->category}}</p>
                            </div>      
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <h5 class="text-secondary">Documents</h5>
                    <div class="card">
                        <div class="card-body row">
                            <div class="col">
                                <table class="table  table-hover table-stripped table-bordered dt-responsive nowrap">
                                    <thead class="thead-theme"> 
                                        <tr>
                                            <th>Name</th>
                                           
                                            <th>Date Expired</th>
                                            <th class="hideme">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @if(isset($personnel->t_bosiet))      <tr>
                                            <td><a href="{{url('storage/app')}}/{{$personnel->t_bosiet}}" target="_blank">T-Bosiet</a></td>
                                           
                                            <td>{{$personnel->t_bosiet_validity_date}} ({{$personnel->exp($personnel->t_bosiet_validity_date)}})</td>

                                            <td class="hideme">  <a href="{{ url('personnel/delete-cert/1') }}?id={{$personnel->id}}" class="btn btn-danger btn-sm">delete</a></td>
                                        </tr>@endif
                                   @if(isset($personnel->general_medicals))     <tr>
                                            <td><a href="{{url('storage/app')}}/{{$personnel->general_medicals}}" target="_blank">General Medicals</a></td>
                                            
                                            <td>{{$personnel->general_medicals_validity_date}} ({{$personnel->exp($personnel->general_medicals_validity_date)}})</td>
                                            <td class="hideme">  <a href="{{ url('personnel/delete-cert/2') }}?id={{$personnel->id}}" class="btn btn-danger btn-sm">delete</a></td>
                                        </tr>@endif
                                  @if(isset($personnel->tuberculosis))      <tr>
                                            <td><a href="{{url('storage/app')}}/{{$personnel->tuberculosis}}" target="_blank">Tuberculosis</a></td>
                                            
                                            <td>{{$personnel->tuberculosis_validity_date}} ({{$personnel->exp($personnel->tuberculosis_validity_date)}})</td>

                                            <td class="hideme">  <a href="{{ url('personnel/delete-cert/3') }}?id={{$personnel->id}}" class="btn btn-danger btn-sm">delete</a></td>

                                        </tr>@endif
                                  @if(isset($personnel->alcohol_and_drug))      <tr>
                                            <td><a href="{{url('storage/app')}}/{{$personnel->alcohol_and_drug}}" target="_blank">Alcohol &amp; Drug</a></td>
                                             
                                            <td>{{$personnel->alcohol_and_drug_validity_date}} ({{$personnel->exp($personnel->alcohol_and_drug_validity_date)}})</td>

                                            <td class="hideme">  <a href="{{ url('personnel/delete-cert/4') }}?id={{$personnel->id}}" class="btn btn-danger btn-sm">delete</a></td>
                                        </tr>@endif

                                         @if(isset($personnel->osp))         <tr>
                                            <td><a href="{{url('storage/app')}}/{{$personnel->osp}}" target="_blank"> OSP</a></td>
                                            <td>{{$personnel->osp_validity_date}} ({{$personnel->exp($personnel->osp_validity_date)}})</td>

                                            <td class="hideme">  <a href="{{ url('personnel/delete-cert/5') }}?id={{$personnel->id}}" class="btn btn-danger btn-sm">delete</a></td>
                                        </tr> 
                                        @endif

                                   @if(isset($personnel->malaria))     <tr>
                                            <td><a href="{{url('storage/app')}}/{{$personnel->malaria}}" target="_blank">Malaria Test</a></td>
                                           
                                            <td>{{$personnel->malaria_validity_date}} ({{$personnel->exp($personnel->malaria_validity_date)}})</td>

                                            <td class="hideme">  <a href="{{ url('personnel/delete-cert/6') }}?id={{$personnel->id}}" class="btn btn-danger btn-sm">delete</a></td>
                                        </tr> @endif


                                        @if(isset($personnel->trade_certificate))         <tr>
                                            <td><a href="{{url('storage/app')}}/{{$personnel->trade_certificate}}" target="_blank"> Trade Certificate</a></td>
                                            <td>{{$personnel->trade_certificate}}</td>
                                            <td>{{$personnel->trade_certificate_validity_date}} ({{$personnel->exp($personnel->trade_certificate_validity_date)}})</td>
                                            <td class="hideme">  <a href="{{ url('personnel/delete-cert/7') }}?id={{$personnel->id}}" class="btn btn-danger btn-sm">delete</a></td>
                                        </tr> 
                                        @endif

                                    </tbody>
                                </table>
                                
                            </div>      
                        </div>
                    </div>
                </div>
            
            </div>
        <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="personnel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Personnel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <form id="userForm" action="{{url('personnel/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="personnel_id" name="personnel_id" value=""/>
                    <div class="modal-body">
                             <div class="pt-2">
                                <h4><b>Personal Information*</b></h4>
                        </div>
                         <div class="form-row">
                            <div class="col">
                                <label for="p_image">Personnel Picture</label>
                                <input type="file" class="form-control" id="p_image" name="image" placeholder="Personnel Picture" > 
                            </div>
                            
                        </div> <br>
                      

                        <div class="form-row">
                            <div class="col">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="p_firstName" name="firstname" placeholder="First Name" required> 
                            </div>
                            <div class="col">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="p_lastName" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-row">
                             <div class="col">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" id="p_phone_number" placeholder="Phone Number" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="p_exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            
                        </div>
                        <div class="form-row">
                             
                            <div class="col">
                                <label for="lastName">Employment Status</label>
                                <select name="employment_status" id="p_employment" class="form-control form-control-chosen" data-placeholder="Please select..." required> 
                                    <option value="">Please select...</option>
                                    <option value="Contract Staff">Contract Staff</option>
                                    <option value="Full Staff">Full Staff</option>
                                      <option value="Expatriate">Expatriate</option>
                                    <option value="Yet to be employed">Yet to be employed</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="category">Category</label>
                                <select name="category" id="p_category" class="form-control form-control-chosen" data-placeholder="Please select..." required> 
                                    <option value="">Please select...</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Construction">Construction</option>
                                    <option value="PMT">PMT</option>
                                    <option value="Quality">Quality</option>
                                    <option value="Safety">Safety</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="col">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="p_designation" name="designation" aria-describedby="emailHelp" placeholder="Designation" required>
                            </div>
                            <div class="col">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="p_company"  name="company" aria-describedby="emailHelp" placeholder="Company" required>
                            </div>
                              
                        </div>
                        <div class="form-row">
                            
                            
                              <div class="col">
                                <label for="nationality">Nationality</label>
                                <select onchange="change1()"  name="nationality" id="nationality_up" class="form-control form-control-chosen" data-placeholder="Please select..." required> 
                                    <option value="">Please select...</option>
                                    <option value="Local">Local</option>
                                    <option value="Expatriate">Expatriate</option>
                                </select>
                            </div>


                             <div class="col country_update" style="display: none">
                                <label for="country">Country</label>
                                <select  name="country" id="country_update" class="form-control form-control-chosen" data-placeholder="Please select..."> 
                                    
                                </select>
                            </div>
                        </div>

                        <div class="pt-2">
                                <h4><b>Certifications*</b></h4>
                        </div>
    
                         <div class="form-row">
                           
                            <div class="col">
                                  <label for="t_bosiet">T-Bosiet</label>
                               <input  class="form-control" type="file" name="t_bosiet" id="image" >  
                            </div>
                            <div class="col">
                                <label for="t_bosiet">Expiry Date<br></label>
                                <input placeholder="dd/mm/yyyy" name="t_bosiet_validity_date"  class="date form-control" /> 
                            </div>
                     </div>


                         <div class="form-row">
                           
                            <div class="col">
                                  <label for="general_medicals">Medical Test</label>
                               <input ="" class="form-control" type="file" name="general_medicals" id="image" >  
                            </div>
                            <div class="col">
                                <label for="general_medicals">Expiry Date<br></label>
                                <input placeholder="dd/mm/yyyy" name="general_medicals_validity_date"  class="date form-control" /> 
                            </div>
                     </div>



                         <div class="form-row">
                           
                            <div class="col">
                                  <label for="tuberculosis">Tuberculosis Test</label>
                               <input ="" class="form-control" type="file" name="tuberculosis" id="image" >  
                            </div>
                            <div class="col">
                                <label for="tuberculosis">Expiry Date<br></label>
                                <input placeholder="dd/mm/yyyy" name="tuberculosis_validity_date"  class="date form-control" /> 
                            </div>
                     </div>

                     <div class="form-row">
                           
                            <div class="col">
                                  <label for="alcohol_and_drug">Alcohol and Drug Test</label>
                               <input ="" class="form-control" type="file" name="alcohol_and_drug" id="image" >  
                            </div>
                            <div class="col">
                                <label for="alcohol_and_drug">Expiry Date<br></label>
                                <input placeholder="dd/mm/yyyy" name="alcohol_and_drug_validity_date"  class="date form-control" /> 
                            </div>
                     </div>

                      <div class="form-row">
                           
                            <div class="col">
                                  <label for="malaria">Malaria (Required for Expartrites)</label>
                                <input class="form-control expatriates" type="file" name="malaria" id="image" >  
                            </div>
                            <div class="col">
                                <label for="malaria">Expiry Date<br></label>
                                <input placeholder="dd/mm/yyyy" name="malaria_validity_date"  class="date form-control expatriates" />
                            </div>
                     </div>

                      <div class="form-row">
                           
                            <div class="col">
                                  <label for="osp">Offshore Safety Permit</label>
                                <input class="form-control" type="file" name="osp" id="image" >  
                            </div>
                            <div class="col">
                                <label for="osp">Expiry Date<br></label>
                                <input placeholder="dd/mm/yyyy" name="osp_validity_date"  class="date form-control" />
                            </div>
                     </div>

                       <div class="form-row">
                           
                            <div class="col">
                                  <label for="osp">Trade Certificate</label>
                                <input class="form-control" type="file" name="trade_certificate" id="image" >  
                            </div>
                            <div class="col">
                                <label for="osp">Expiry Date<br></label>
                                <input placeholder="dd/mm/yyyy" name="trade_certificate_validity_date"  class="date form-control" />
                            </div>
                     </div>
                            <br>        
        
                                </tbody>
                               
                        </table>
        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        </div>
    </main>

@endsection


@section('page_scripts')

@if(session('message') != NULL)
<script type="text/javascript">
    
toastr.success('{{session('message')}}')

</script>


@endif

<script>

     $('.date').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy'
});
    function printInfo() {
    var content = $('#printinfo');

    $('aside').hide();
    $('.menu-toggler').click();
    $('header').hide();
    $('footer').hide();
    $('.hideme').hide();
    print();
    $('aside').show();
    $('.menu-toggler').click();
    $('header').show();
    $('footer').show();
    $('.hideme').show();

} 
    $(document).ready(function() {


    $('#personnels').DataTable(  {
       "fixedHeader": true ,
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ]
} );

$(".personnels").click(function () {
    var [firstName, lastName] = $(this).data('name').split(" ")
    
    
    $('#personnel_id').val($(this).data('p_id'));
    $('#p_firstName').val(firstName);
    $('#p_lastName').val(lastName);
    $('#p_phone_number').val($(this).data('phone'));
    $('#p_exampleInputEmail1').val($(this).data('email'));
    $('#p_employment').val($(this).data('employment_status'));
    $('#p_category').val($(this).data('category'));
    $('#p_designation').val($(this).data('designation'));
    $('#p_company').val($(this).data('company'));
    $('#nationality_up').val($(this).data('nationality'));
    if ($(this).data('nationality') == 'Expatriate') {
         $(".country_update").show();
         $("#country_update").attr('required', 'required');
    }
     $('#country_update').val($(this).data('country'));
    $('#personnel').modal('show');
});





} );

  function change1() {
       var values = event.srcElement.value
       if (values === 'Expatriate' ){
        
         $(".country_update").show();
         $("#country_update").attr('required', 'required');
       }
        if (values === 'Local' ){
       
        $(".country_update").hide();
       }
    }
</script>


<script type="text/javascript">
    // Countries
var country_arr = new Array("Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Anguilla", "Antartica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Island", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czeck Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "Gambia, The", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City)", "Honduras", "Hong Kong", "Howland Island", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Ireland, Northern", "Israel", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jarvis Island", "Jersey", "Johnston Atoll", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Man, Isle of", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Midway Islands", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcaim Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romainia", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Scotland", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and South Sandwich Islands", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Tobago", "Toga", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "USA", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Wales", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
function populateCountries(countryElementId, stateElementId) {
    // given the id of the <select> tag as function argument, it inserts <option> tags
    var countryElement = document.getElementById(countryElementId);
    countryElement.length = 0;
    countryElement.options[0] = new Option('Select Country', '');
    countryElement.selectedIndex = 0;
    for (var i = 0; i < country_arr.length; i++) {
        countryElement.options[countryElement.length] = new Option(country_arr[i], country_arr[i]);
    }

    // Assigned all countries. Now assign event listener for the states.

    if (stateElementId) {
        countryElement.onchange = function () {
            populateStates(countryElementId, stateElementId);
        };
    }
}

</script>
<script type="text/javascript"> populateCountries("country_update"); </script>

@endsection